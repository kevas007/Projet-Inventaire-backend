<template>
    <v-container>
        <v-row>
            <v-col>
                <h1>Liste des matériels</h1>
            </v-col>
            <v-col class="mt-2">
                <v-btn
                    class="text--primary"
                    href="/inventaire/materiel/create"
                >Ajouter un nouveau materiel</v-btn>
            </v-col>
            <v-col class="mt-2">
                <v-btn
                    class="text--primary"
                    href="/inventaire/materiel/codeQr"
                >Recheche via qrcode</v-btn>
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
                        <th class="text-left">Archivé</th>
                        <th class="text-left">Supprimer</th>
                        <th class="text-left">Pdf</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="item in materiels" :key="item.id">
                        <td>{{ item.nom }}</td>
                        <td>{{ item.numero_serie }}</td>
                        <td>{{ item.statut.nom }}</td>
                        <td>
                            <div>
                                <v-btn :href="'/inventaire/materiel/' + item.id" color="primary">
                                    <v-icon>mdi-eye</v-icon>
                                    <!-- <v-icon>Plus</v-icon> -->
                                </v-btn>
                            </div>
                        </td>
                        <td>
                            <div v-if="item.deleted_at == null">
                                <v-form
                                    :action="'/inventaire/materiel/' + item.id + '/delete'"
                                    method="POST"
                                >
                                    <input type="hidden" name="_token" :value="csrf" />
                                    <input type="hidden" name="_method" value="delete" />
                                    <v-btn type="submit" color="red" class="white--text">Archivé</v-btn>
                                </v-form>
                            </div>
                            <div v-else>
                                <p class="text-center">
                                    <v-btn
                                    class="ma-1 flex items-center "
                                        :href="'/inventaire/materiel/' + item.id + '/restaurer'"
                                        color="primary"
                                    >Restaurer</v-btn>
                                </p>
                            </div>
                        </td>
                        <td>
                            <div v-if="item.deleted_at != null">
                                <v-form
                                    :action="'/inventaire/materiel/' + item.id + '/forceDelete'"
                                    method="POST"
                                >
                                    <input type="hidden" name="_token" :value="csrf" />
                                    <input type="hidden" name="_method" value="delete" />
                                    <v-btn type="submit" color="red" class="white--text">
                                        <v-icon>mdi-trash-can-outline</v-icon>
                                        <!-- <v-icon>Plus</v-icon> -->
                                    </v-btn>
                                </v-form>
                            </div>
                            <div v-else>
                                <p class="text-center">/</p>
                            </div>
                        </td>
                        <td>
                            <div v-if="item.deleted_at == null">
                                <v-btn
                                    class="btn btn-primary"
                                    :href="'/inventaire/materiel/' + item.id + '/pdf'"
                                >
                                    Export to PDF
                                    <!-- <v-icon>Plus</v-icon> -->
                                </v-btn>
                            </div>
                            <div v-else>
                                <p class="text-center">/</p>
                            </div>
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
            csrf: document
                .querySelector('meta[name="csrf-token"]')
                .getAttribute("content"),

        }
    },
};
</script>
