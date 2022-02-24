<template>
  <v-container>
    <v-container class="mx-auto text-center">
      <v-form
        :action="'/inventaire/restitution/' + (materiel ? materiel.id : '0')"
        method="post"
      >
        <input type="hidden" name="_token" :value="csrf" />

        <qrcode-stream
          :track="selected.value"
          @init="logErrors"
          class="camera"
          @decode="onDecode"
          :key="_uid"
          :camera="camera"
        >
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
    const options = [
      { text: "nothing (default)", value: undefined },
      { text: "outline", value: this.paintOutline },
      { text: "centered text", value: this.paintCenterText },
      { text: "bounding box", value: this.paintBoundingBox },
    ];
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
    checkIsValidToken(token) {
      return this.materiels.find((elem) => {
        console.log(elem.token, token);
        return elem.token == token;
      });
    },
    onDragOver(draggingOver) {
      this.draggingOver = draggingOver;
    },
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

    async onDecode(decodedString) {
      let arr = decodedString.split("/");
      let tokenToCheck = arr[arr.length - 1];

      if (this.checkIsValidToken(tokenToCheck)) {
        this.materiel = this.checkIsValidToken(tokenToCheck);
        this.isValid = true;
        // this.result = token;
      } else {
        this.isValid = false;

        // this.result = token;
      }
      this.turnCameraOff();

      // pretend it's taking really long
      await this.timeout(3000);
      this.isValid = this.checkIsValidToken(tokenToCheck) != undefined;

      // some more delay, so users have time to read the message
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
