<template>
  <v-container>
    <h2></h2>
    <v-form :action="'/inventaire/reserver/' + materiel.id" method="POST">
      <input type="hidden" name="_token" :value="csrf" />
      <v-container>
        <v-row>
          <v-col cols="12" md="12">
            <v-select
              :items="utilities"
              item-text="nom"
              item-value="id"
              label="Utilisation"
              single-line
            ></v-select>
          </v-col>
          <v-col cols="12" md="12">
            <v-date-picker
              v-model="date"
              :allowed-dates="
                (val) => {
                  disablePastDates(val);
                }
              "
              class="mt-4"
            ></v-date-picker>
          </v-col>
        </v-row>
      </v-container>
    </v-form>
  </v-container>
</template>
<script>
export default {
  name: "Show",
  props: {
    utilities: Array,
    materiel: Object,
  },
  data() {
    return {
      date: null,
      csrf: document
        .querySelector('meta[name="csrf-token"]')
        .getAttribute("content"),
    };
  },
  methods: {
    disablePastDates(val) {
      return val >= new Date().toISOString().substr(0, 10);
    },
  },
};
</script>
<style>
</style>
