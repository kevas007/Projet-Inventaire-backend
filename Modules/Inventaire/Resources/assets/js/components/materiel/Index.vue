<template>
    <v-container>
        <v-row>
            <v-col>
                <h1>Liste des matériels</h1>
            </v-col>
            <v-col class="mt-2">
                <v-btn class="text--primary" href="/inventaire/materiel/create">Ajouter un nouveau materiel</v-btn>
            </v-col>
        </v-row>
        <v-simple-table>
            <template v-slot:default>
                <thead>
                    <tr>
                        <th class="text-left">Nom</th>
                        <th class="text-left">Numéro de série</th>
                        <th class="text-left">Statut</th>
                        <th class="text-left"></th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="item in materiels" :key="item.id">
                        <td>{{ item.nom }}</td>
                        <td>{{ item.numero_serie }}</td>
                        <td>{{ item.statut.nom }}</td>
                        <td>
                            <v-btn :href="'/inventaire/materiel/' + item.id" color="primary">
                                <v-icon>mdi-eye</v-icon>
                                <!-- <v-icon>Plus</v-icon> -->
                            </v-btn>
                        </td>
                    </tr>
                </tbody>
            </template>
        </v-simple-table>
    </v-container>
</template>

<script>
export default {
    props: {
        materiels: {
            type: Array,
            required: true,
        }
    },
    mounted() {
        console.log(this.materiels)

    },
    data() {
        return {

        }
    },
};
</script>
