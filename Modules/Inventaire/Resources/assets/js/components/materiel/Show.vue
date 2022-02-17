<template>
    <v-container>
        <v-card class="mx-auto" max-width="344">
            <v-card-text>
                <p class="text-h4 text--primary">Fiche du Matériel</p>
                <p class="text-h6 text--primary">
                    Matériel : {{
                        this.materiel.nom
                    }}
                </p>
                <p class="text-h6 text--primary">
                    Muméro de serie : {{
                        this.materiel.numero_serie
                    }}
                </p>
                <p class="text-h6 text--primary">
                    Token : {{
                        this.materiel.token
                    }}
                </p>
                <p class="text-h6 text--primary">
                    Statut : {{
                        this.materiel.statut.nom
                    }}
                </p>
                <p class="text-h6 text--primary">
                    Type : {{
                        this.materiel.type.nom
                    }}
                </p>
                <p class="text-h6 text--primary">
                    Place : {{
                        this.materiel.place.nom
                    }}
                </p>
                <p class="text-h6 text--primary">
                    Durée : {{
                        this.materiel.duree
                    }}
                </p>
                <div v-if="this.materiel.statut.id == 2 || this.materiel.statut.id == 3">
                    <v-btn
                        :href="'/inventaire/reserver/' + this.materiel.id"
                        color="primary"
                    >Reserver</v-btn>
                </div>
            </v-card-text>
            <v-card-actions>
                <v-btn color="orange lighten-2" text>Plus</v-btn>

                <v-spacer></v-spacer>

                <v-btn icon @click="show = !show">
                    <v-icon>{{ show ? 'mdi-chevron-up' : 'mdi-chevron-down' }}</v-icon>
                </v-btn>
            </v-card-actions>

            <v-expand-transition>
                <div v-show="show">
                    <v-divider></v-divider>

                    <v-card-text>
                        <p class="text-h6 text--primary">
                            Processeur : {{
                                this.info.processeur
                            }}
                        </p>
                        <p class="text-h6 text--primary">
                            Ram : {{
                                this.info.ram
                            }}
                        </p>
                        <p class="text-h6 text--primary">
                            Taille du Stockage: {{
                                this.info.taille_stockage
                            }}
                        </p>
                        <p class="text-h6 text--primary">
                            Marque: {{
                                this.info.marque
                            }}
                        </p>
                        <p class="text-h6 text--primary">
                            Description : {{
                                this.info.description
                            }}
                        </p>
                        <p class="text-h6 text--primary">
                            Dégats: {{
                                this.info.degats
                            }}
                        </p>
                        <p class="text-h6 text--primary">
                            Stockage: {{
                                this.info.stockage.nom
                            }}
                        </p>
                    </v-card-text>
                </div>
            </v-expand-transition>
        </v-card>
    </v-container>
</template>
<script>
export default {
    props: {
        materiel: {
            type: Object,
            required: true,
        },
        info: {
            type: Object,
            required: true,
        },
    },
    mounted() {
        console.log(this.materiel, this.info);
    },
    data: () => ({
        show: false,
    }),

}
</script>
