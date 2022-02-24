<template>
  <v-navigation-drawer
    permanent
    v-model="drawer"
    app
    class="pt-4"
    color="grey lighten-3"
  >
    <v-list>
      <v-list-item
        v-for="n in route"
        :key="n.id"
        class="d-block text-center mx-auto mb-9 mdi mdi-24px"
        :href="'/inventaire'+ n.path"
            >
            {{
                n.name
            }}</v-list-item>
        </v-list>
    </v-navigation-drawer>
</template>

<script>
export default {
  name: "Inventaire",
  data() {
    return {
      drawer: false,
      route: [
        {
          id: 1,
          name: "Matériel",
          icon: "mdi-material-ui",
          path: "/materiel",
        },
        {
          id: 2,
          name: "Emprunt",
          icon: "mdi-hardware",
          path: "/emprunt",
        },
        {
          id: 3,
          name: "Restitution",
          icon: "mdi-hardware",
          path: "/restitution",
        },
        {
          id: 4,
          name: "Contrat",
          icon: "mdi-hardware",
          path: "/contrat",
        },
      ],
    };
  },
};
</script>
