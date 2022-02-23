<template>
    <v-container>
        <v-row>
            <v-col>
                <h1>Liste des contrats</h1>
            </v-col>
        </v-row>
        <v-simple-table>
            <template v-slot:default>
                <thead>
                    <tr>
                        <th class="text-left">Lead</th>
                        <th class="text-left">Emprunteur</th>
                        <th class="text-left">Matériel</th>
                        <th class="text-left">Endroit</th>
                        <th class="text-left">Statut</th>
                        <th class="text-left">Voir</th>
                        <th class="text-left">Modifier</th>
                        <!-- <th class="text-left">Supprimer</th> -->
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="item in contrats" :key="item.id">
                        <td>
                            <div v-if="item.preteur.lead_id==1">
                        {{ item.preteur.firstname }} {{ item.preteur.lastname }}
                            </div>

                        </td>
                        <td v-if="item.emprunteur">Emprunteur {{ item.emprunteur.nom }} {{item.emprunteur.prenom}}</td>
                        <td v-else-if="item.team"> {{ item.team.lastname }} {{ item.team.firstname}}</td>
                        <td v-else> Le prêteur</td>
                        <td>{{ item.materiel.nom }}</td>
                        <td>{{ item.materiel.place.nom }}</td>
                        <td>{{ item.statut.nom }}</td>
                        <td>
                            <div>
                                <v-btn :href="'/inventaire/contrat/' + item.id" color="primary">
                                    <!-- <script src="https://cdn.lordicon.com/lusqsztk.js"></script> -->
                <v-icon>mdi-eye</v-icon>
                                </v-btn>
                            </div>
                        </td>
                        <td>
                            <div>
                                <v-btn :href="'/inventaire/contrat/' + item.id +'/edit'" color="success">
                                    <!-- <script src="https://cdn.lordicon.com/lusqsztk.js"></script> -->
                <v-icon>mdi-clipboard-edit-outline</v-icon>
                                </v-btn>
                            </div>
                        </td>
                        <!-- <td>
                            <div v-if="item.deleted_at == null">
                                <v-form
                                    :action="'/inventaire/materiel/' + item.id + '/forceDelete'"
                                    method="POST"
                                >
                                    <input type="hidden" name="_token" :value="csrf" />
                                    <input type="hidden" name="_method" value="delete" />
                                    <v-btn type="submit" color="red" class="white--text">


                                    </v-btn>
                                </v-form>
                            </div>
                            <div v-else>
                                <p class="text-center">/</p>
                            </div>
                        </td> -->
                    </tr>
                </tbody>
            </template>
        </v-simple-table>
    </v-container>
</template>

<script>
export default {
    props: {
        contrats: {
            type: Array,
            required: true,
        },
    },
    mounted() {
        console.log(this.contrats);

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
