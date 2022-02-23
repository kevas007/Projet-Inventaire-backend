<template>
  <v-container>
    <v-row class="justify-center ma-10 text-center">
      <v-col @click="setEmprunt('moi')" cols="4">
        <v-btn class="white--text" color="green">Moi</v-btn>
      </v-col>
      <v-col @click="setEmprunt('team')" cols="4">
        <v-btn class="white--text" color="green">Une team</v-btn>
      </v-col>
      <v-col @click="setEmprunt('autre')" cols="4">
        <v-btn class="white--text" color="green">Autre Personne</v-btn>
      </v-col>
    </v-row>
    <v-container class="mx-auto text-center">
      <v-form
        v-if="typeEmpruntSelect == 'moi'"
        :action="'/inventaire/contrat/self/store'"
      >
        <input type="hidden" name="_token" :value="csrf" />
        <v-select
          name="materiel_id"
          v-model="materiel"
          :items="materiels"
          item-value="id"
          item-text="nom"
        ></v-select>
        <v-btn color="primary" type="submit">Confirmer</v-btn>
      </v-form>
      <v-form
        :action="
          '/inventaire/contrat/' + (materiel ? materiel.id : '0') + '/team'
        "
        v-else-if="typeEmpruntSelect == 'team'"
        method="post"
      >
        <input type="hidden" name="_token" :value="csrf" />

        <qrcode-stream class="camera" @decode="onDecode" />
        <v-select
          v-if="materiel"
          :items="users"
          item-text="firstname"
          name="team_id"
          v-model="team_member_id"
          item-value="id"
          label="Team"
          single-line
        >
          <template slot="selection" slot-scope="data">
            {{ data.item.firstname }} {{ data.item.lastname }}
          </template>
          <template slot="item" slot-scope="data">
            {{ data.item.firstname }} {{ data.item.lastname }}
          </template>
        </v-select>

        <v-btn type="submit" v-if="checkSelectedTeamMember" color="primary"
          >Confirm</v-btn
        >
      </v-form>
      <v-form
        v-else-if="typeEmpruntSelect == 'autre'"
        enctype="multipart/form-data"
        :action="
          '/inventaire/contrat/' +
          (materiel ? materiel.id : '0') +
          '/emprunteur'
        "
        method="POST"
      >
        <qrcode-stream class="camera" @decode="onDecode" />
        <input type="hidden" name="_token" :value="csrf" />
        <v-file-input
          v-if="materiel"
          name="cart_id"
          v-model="photo_id"
        ></v-file-input>
        <v-row v-show="photo_id" v-if="materiel">
          <v-col cols="4">
            <v-text-field name="nom" label="nom"></v-text-field>
          </v-col>
          <v-col cols="4">
            <v-text-field name="prenom" label="prenom"></v-text-field>
          </v-col>
          <v-col cols="4">
            <v-text-field name="formation" label="formation"></v-text-field>
          </v-col>
          <v-col cols="4">
            <v-text-field name="adresse" label="adresse"></v-text-field>
          </v-col>
          <v-col cols="4">
            <v-text-field name="duree" label="duree"></v-text-field>
          </v-col>
          <v-col cols="12">
            <p>Date de naissance</p>
            <v-date-picker
              name="date_naissance"
              label="date_naissance"
              v-model="date_naissance"
            ></v-date-picker>
            <input type="hidden" name="date_naissance" :value="date_naissance">
          </v-col>
        </v-row>
        <v-btn v-if="materiel" type="submit" color="primary">Register</v-btn>
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
    users: [Array],
  },
  components: { QrcodeStream },
  data() {
    return {
      typeEmpruntSelect: "moi",
      team_member_id: 0,
      photo_id: null,
      draggingOver: false,
      date_naissance: '',
      materiel: null,
      csrf: document
        .querySelector('meta[name="csrf-token"]')
        .getAttribute("content"),
    };
  },
  methods: {
    setEmprunt(value) {
      this.typeEmpruntSelect = value;
      this.materiel = null;
    },
    checkIsValidToken(token) {
      return this.materiels.find((elem) => {
        console.log(elem.token, token);
        return elem.token == token;
      });
    },
    onDecode(decodedString) {
      let arr = decodedString.split("/");
      let tokenToCheck = arr[arr.length - 1];

      if (this.checkIsValidToken(tokenToCheck)) {
        this.materiel = this.checkIsValidToken(tokenToCheck);
      }
    },
    onDragOver(draggingOver) {
      this.draggingOver = draggingOver;
    },
  },
  computed: {
    checkSelectedTeamMember() {
      return (
        this.users.filter((elem) => elem.id == this.team_member_id).length > 0
      );
    },
  },
};
</script>
<style>
.camera {
  width: 50%;
  height: 100%;
}
</style>
