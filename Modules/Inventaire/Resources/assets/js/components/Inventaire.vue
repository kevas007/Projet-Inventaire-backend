<template>
    <v-navigation-drawer permanent v-model="drawer" app class="pt-4" color="grey lighten-3">
        <v-list>

                <v-list-item
                    class="d-block text-center mx-auto mb-9 mdi mdi-24px"
                    href="/inventaire/materiel"
                >
                        <span class=" ">Matériel</span>
                    </v-list-item>
                <v-list-item
                    v-if="user.lead_id == true"
                    class="d-block text-center mx-auto mb-9 mdi mdi-24px"
                    href="/inventaire/emprunt"
                >
                        <span class=" ma-5">Emprunt</span>
                        </v-list-item>
                <v-list-item
                    class="d-block text-center mx-auto mb-9 mdi mdi-24px"
                    href="/inventaire/restitution"
                >
                        <span class=" ma-5">Restitution</span>
                        </v-list-item>
                <v-list-item
                    v-if="user.lead_id == true"
                    class="d-block text-center mx-auto mb-9 mdi mdi-24px"
                    href="/inventaire/contrat"
                >
                        <span class="ma-5">Contrat</span>
                </v-list-item>
        </v-list>
        <template v-slot:append>
            <v-form class="text-center mb-5" action="/logout" method="post">
                <input type="hidden" name="_token" :value="csrf" />
                <v-btn class type="submit">Logout</v-btn>
            </v-form>
        </template>
    </v-navigation-drawer>
</template>

<script>
export default {
    props: {
        user: {
            type: Object,
            required: true,
        },
    },
    mounted() {
        console.log(this.user);
    },
    name: "Inventaire",
    data() {
        return {
            drawer: false,
            csrf: document.querySelector('meta[name="csrf-token"]').getAttribute("content"),
        };
    },
};
</script>
