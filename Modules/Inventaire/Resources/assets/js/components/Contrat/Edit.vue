<template>
    <v-container fluid grid-list-xl>
        <v-layout row wrap>
            <v-flex d-flex lg12 sm12 xs12>
                <v-card style="margin-bottom: 150px;">
                    <v-toolbar color="cyan" dark>
                        <v-toolbar-title>Contrat</v-toolbar-title>

                        <v-spacer></v-spacer>

                        <v-btn></v-btn>
                    </v-toolbar>

                    <v-list two-line>
                        <template>
                            <v-card class="m-2" elevation="2" outlined tile>
                                <v-card-text>
                                    <p>
                                        Mateirel :
                                        <span>{{ edit.materiel.nom }}</span>
                                    </p>
                                    <p>
                                        Nom du préteur :
                                        <span>{{ edit.preteur.lastname }}</span>
                                    </p>
                                    <p>
                                        Lieux :
                                        <span>{{ edit.materiel.place.nom }}</span>
                                    </p>

                                    <p>
                                        Nom de l'emprunteur :
                                        <span>{{ edit.emprunteur.nom }}</span>
                                    </p>
                                    <p>
                                        Prénom de l'emprunteur :
                                        <span>{{ edit.emprunteur.prenom }}</span>
                                    </p>
                                    <p>
                                        Lieu de résidence :
                                        <span>{{ edit.emprunteur.adresse }}</span>
                                    </p>
                                    <p>
                                        Statut du contrat :


                                        <v-form
                                            :action="'/inventaire/contrat/' + this.edit.id + '/edit'"
                                            method="POST"
                                        >
                                            <input type="hidden" name="_token" :value="csrf" />
                                            <input type="hidden" name="_method" value="put" />
                                            <v-select
                                                :items="this.statut"
                                                item-value="id"
                                                item-text="nom"
                                                name="statut_contrat_id"
                                                :value="this.edit.statut"
                                            ></v-select>
                                            <v-btn type="submit">Changer</v-btn>
                                        </v-form>
                                    </p>
                                </v-card-text>
                            </v-card>
                        </template>
                    </v-list>
                </v-card>
            </v-flex>
        </v-layout>
    </v-container>
</template>

<script>

export default {
    props: {
        edit: {
            type: Object,
            required: true,
        },
        statut:{
             type: Array,
            required: true,
        }

    },
    data() {
        return {
            csrf: document
                .querySelector('meta[name="csrf-token"]')
                .getAttribute("content"),
        }
    },
    methods: {
        openDetail() {
            const vm = this;

        }
    },
    mounted() {
        console.log(this.edit)
    }
}
</script>

<style>
</style>
