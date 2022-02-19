<template>
    <v-container>
        <v-row>
            <v-col>
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
                        <v-form
                            :action="'/inventaire/materiel/' + this.materiel.id + '/edit'"
                            method="POST"
                        >
                            <input type="hidden" name="_token" :value="csrf" />
                            <input type="hidden" name="_method" value="put" />
                            <v-select
                                :items="this.statut"
                                item-value="id"
                                item-text="nom"
                                name="statut_id"
                                :value="this.materiel.statut"
                            ></v-select>
                            <v-btn type="submit">Changer</v-btn>
                        </v-form>

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
                        <div class="ma-2" v-if="this.materiel.deleted_at == null">
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
            </v-col>
            <v-col>
                <v-btn @click="show = !show" >
                    <v-icon>mdi-qrcode-scan</v-icon>
                </v-btn>
                <SearchQr :materiel="this.materiel.token"  v-if="show" />
            </v-col>
        </v-row>
    </v-container>
</template>
<script>
import SearchQr from './SearchQr.vue';
export default {
    components: {
       SearchQr
    },
    props: {
        materiel: {
            type: Object,
            required: true,
        },
        info: {
            type: Object,
            required: true,
        },
        statut: {
            type: Array,
            required: true,
        },
    },
 
    data: () => ({
        csrf: document
            .querySelector('meta[name="csrf-token"]')
            .getAttribute("content"),
        show: false,
    }),

}
</script>
