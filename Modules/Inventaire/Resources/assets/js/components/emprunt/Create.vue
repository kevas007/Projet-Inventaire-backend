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
      <v-btn v-if="typeEmpruntSelect == 'moi'">Confirmer</v-btn>
      <v-form v-else-if="typeEmpruntSelect == 'team'">
        <input type="hidden" name="_token" :value="csrf" />
        Team
      </v-form>
      <v-form v-else-if="typeEmpruntSelect == 'autre'">
        <input type="hidden" name="_token" :value="csrf" />
        Autre
      </v-form>
    </v-container>
  </v-container>
</template>
<script>
export default {
  name: "Create",
  props: {
    id: [Number, String],
  },
  data() {
    return {
      typeEmpruntSelect: "moi",
      csrf: document
        .querySelector('meta[name="csrf-token"]')
        .getAttribute("content"),
    };
  },
  methods: {
    setEmprunt(value) {
      this.typeEmpruntSelect = value;
    },
  },
};
</script>
<style>
</style>
