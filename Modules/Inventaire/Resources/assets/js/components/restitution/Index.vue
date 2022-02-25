<template>
  <v-container>
    <v-container class="mx-auto text-center">
      <v-form
        :action="'/inventaire/restitution/' + (materiel ? materiel.id : '0')"
        method="post"
      >
        <input type="hidden" name="_token" :value="csrf" />
    <!-- Permet d'afficher la caméra pour scanner le code QR Code -->
        <qrcode-stream
          :track="selected.value"
          @init="logErrors"
          class="camera"
          @decode="onDecode"
          :key="_uid"
          :camera="camera"
        >
        <!-- Affiche un overlay avec un message précis selon que les conditions soient remplies ou non -->
          <div v-if="validationSuccess" class="validation-success">
            Matériel trouvé !
          </div>

          <div v-if="validationFailure" class="validation-failure">
            Le Matériel n'avait pas été prété !
          </div>

          <div v-if="validationPending" class="validation-pending">
            Scan en cours...
          </div>
        </qrcode-stream>
        <v-text-field
          name="degats"
          v-if="materiel"
          label="Notez les dégâts"
        ></v-text-field>
        <v-btn type="submit" v-if="materiel" color="primary">Confirm</v-btn>
      </v-form>
    </v-container>
  </v-container>
</template>
<script>
import { QrcodeStream } from "vue-qrcode-reader";

export default {
  name: "Create",
  props: {
    materiels: [Array],
  },
  components: { QrcodeStream },
  data() {
    //   Les différentes option pour le code qr
    const options = [
      { text: "nothing (default)", value: undefined },
      { text: "outline", value: this.paintOutline },
      { text: "centered text", value: this.paintCenterText },
      { text: "bounding box", value: this.paintBoundingBox },
    ];
    // Selectionne une option de base
    const selected = options[1];
    return {
      camera: "auto",
      isValid: undefined,
      draggingOver: false,
      materiel: null,
      selected,
      options,
      csrf: document
        .querySelector('meta[name="csrf-token"]')
        .getAttribute("content"),
    };
  },
  methods: {
    //   Vérifie si le token dans le code qr correspond à un matériel prété
    checkIsValidToken(token) {
      return this.materiels.find((elem) => {
        console.log(elem.token, token);
        return elem.token == token;
      });
    },
    onDragOver(draggingOver) {
      this.draggingOver = draggingOver;
    },
    // Permet d'afficher une bordure verte autour du code qr durant le scan
    paintOutline(detectedCodes, ctx) {
      for (const detectedCode of detectedCodes) {
        const [firstPoint, ...otherPoints] = detectedCode.cornerPoints;

        ctx.strokeStyle = "green";

        ctx.beginPath();
        ctx.moveTo(firstPoint.x, firstPoint.y);
        for (const { x, y } of otherPoints) {
          ctx.lineTo(x, y);
        }
        ctx.lineTo(firstPoint.x, firstPoint.y);
        ctx.closePath();
        ctx.stroke();
      }
    },

    paintBoundingBox(detectedCodes, ctx) {
      for (const detectedCode of detectedCodes) {
        const {
          boundingBox: { x, y, width, height },
        } = detectedCode;

        ctx.lineWidth = 2;
        ctx.strokeStyle = "#007bff";
        ctx.strokeRect(x, y, width, height);
      }
    },

    paintCenterText(detectedCodes, ctx) {
      for (const detectedCode of detectedCodes) {
        const { boundingBox, rawValue } = detectedCode;

        const centerX = boundingBox.x + boundingBox.width / 2;
        const centerY = boundingBox.y + boundingBox.height / 2;

        const fontSize = Math.max(
          12,
          (50 * boundingBox.width) / ctx.canvas.width
        );
        console.log(boundingBox.width, ctx.canvas.width);

        ctx.font = `bold ${fontSize}px sans-serif`;
        ctx.textAlign = "center";

        ctx.lineWidth = 3;
        ctx.strokeStyle = "#35495e";
        ctx.strokeText(detectedCode.rawValue, centerX, centerY);

        ctx.fillStyle = "#5cb984";
        ctx.fillText(rawValue, centerX, centerY);
      }
    },

    logErrors(promise) {
      promise.catch(console.error);
    },
    onInit(promise) {
      promise.catch(console.error).then(this.resetValidationState);
    },

    resetValidationState() {
      this.isValid = undefined;
    },

    // Action à exécuter lorsque le code qr a été scanné
    async onDecode(decodedString) {
        // Récupère le token dans le code qr
      let arr = decodedString.split("/");
      let tokenToCheck = arr[arr.length - 1];

    // Vérifie si le token est bon
      if (this.checkIsValidToken(tokenToCheck)) {
        this.materiel = this.checkIsValidToken(tokenToCheck);
        this.isValid = true;
      } else {
        this.isValid = false;
      }
      this.turnCameraOff();

      // Fais semblant de prendre du temps
      await this.timeout(3000);
      this.isValid = this.checkIsValidToken(tokenToCheck) != undefined;

      // Ajoute un petit delai pour que l'utilisateur puisse lire le message
      await this.timeout(2000);

      this.turnCameraOn();
    },

    turnCameraOn() {
      this.camera = "auto";
    },

    turnCameraOff() {
      this.camera = "off";
    },

    timeout(ms) {
      return new Promise((resolve) => {
        window.setTimeout(resolve, ms);
      });
    },
  },
  computed: {
    //   Vérifie si un membre de la team a bien été selectionné
    checkSelectedTeamMember() {
      return (
        this.users.filter((elem) => elem.id == this.team_member_id).length > 0
      );
    },
    validationPending() {
      return this.isValid === undefined && this.camera === "off";
    },

    validationSuccess() {
      return this.isValid === true;
    },

    validationFailure() {
      return this.isValid === false;
    },
  },
};
</script>
<style scoped>
.camera {
  width: 50%;
  height: 100%;

  margin: 0 auto;
}
.validation-success,
.validation-failure,
.validation-pending {
  position: absolute;
  width: 100%;
  height: 100%;

  background-color: rgba(255, 255, 255, 0.8);
  text-align: center;
  font-weight: bold;
  font-size: 1.4rem;
  padding: 10px;

  display: flex;
  flex-flow: column nowrap;
  justify-content: center;
}
.validation-success {
  color: green;
}
.validation-failure {
  color: red;
}
</style>
