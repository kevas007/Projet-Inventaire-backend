<template>
    <v-container>
        <v-form ref="form" v-model="valid" lazy-validation>
            <v-text-field v-model="nom" :counter="30" :rules="nomRules" label="Name" required></v-text-field>

            <v-text-field
                :counter="100"
                v-model="numero_serie"
                :rules="numero_serieRules"
                label="Numero  de serie"
                required
            ></v-text-field>

            <v-text-field :counter="100" v-model="token" :rules="tokenRules" label="Token" required></v-text-field>

            <v-select v-model="statut_id" :items="this.statut.nom" label="Statut" required></v-select>
            <v-select v-model="utility_id" :items="this.utility" label="Utility" required></v-select>

            <v-select v-model="type_id" :items="this.type" label="Type" required></v-select>

            <v-select v-model="place_id" :items="this.place" label="Place" required></v-select>

            <!-- <v-text-field :counter="100" v-model="duree" :rules="dureeRules" label="Durée" required></v-text-field> -->
            <v-text-field
                :counter="100"
                v-model="processeur"
                :rules="processeurRules"
                label="Processeur"
                required
            ></v-text-field>
            <v-text-field :counter="50" v-model="ram" :rules="ramRules" label="Ram" required></v-text-field>
            <v-text-field
                :counter="100"
                v-model="taille_stockage"
                :rules="taille_stockageRules"
                label="Taille de stcokage"
                required
            ></v-text-field>
            <v-text-field
                :counter="100"
                v-model="marque"
                :rules="marqueRules"
                label="Marque"
                required
            ></v-text-field>
            <v-text-field
                :counter="200"
                v-model="description"
                :rules="descriptionRules"
                label="Description"
                required
            ></v-text-field>
            <v-text-field
                :counter="100"
                v-model="degats"
                :rules="degatsRules"
                label="Degats"
                required
            ></v-text-field>
        <v-date-picker v-model="duree"></v-date-picker>
            <v-select v-model="type_id" :items="this.type" label="Type" required></v-select>
         <v-select v-model="stockage_id" :items="this.stockage.nom" label="Stockage" required></v-select>
            <v-btn :disabled="!valid" color="success" class="mr-4" @click="validate">Validate</v-btn>

            <v-btn color="error" class="mr-4" @click="reset">Reset Form</v-btn>

            <v-btn color="warning" @click="resetValidation">Reset Validation</v-btn>
        </v-form>
    </v-container>
</template>
<script>
export default {
    mounted(){
        console.log(this.utility)
    },
  props: {
    utility:{
            type: Array,
            required: true,
        },
      statut:{
           type: Array,
            required: true,
      },
      type:{
            type: Array,
            required: true,
      },
      info:{
            type: Array,
            required: true,
      },
      place:{
          type: Array,
            required: true,
      },
      stockage:{
          type: Array,
            required: true,
      }
  },
    data: () => ({
        valid: true,
        nom: '',
        nomRules: [
            v => !!v || 'Name is required',
            v => (v && v.length <= 10) || 'Name must be less than 10 characters',
        ],
        numero_serie: '',
        numero_serieRules: [
            v => !!v || 'E-mail is required',
            v => (v && v.length <= 100) || 'E-mail must be less than 10 characters',
        ],
        token: '',
        tokenRules: [
            v => !!v || 'Token is required',
            v => (v && v.length <= 100) || 'Token must be less than 10 characters',
        ],
        statut_id: '',
      
        type_id: '',
     
        place_id: '',
     
        duree: '',
        processeur: '',
        processeurRules: [
            v => !!v || 'Processeur is required',
            v => (v && v.length <= 100) || 'Processeur must be less than 10 characters',
        ],
        ram: '',
        ramRules: [
            v => !!v || 'Ram is required',
            v => (v && v.length <= 100) || 'Ram must be less than 10 characters',
        ],
        taille_stockage: '',
        taille_stockageRules: [
            v => !!v || 'Taille de stockage is required',
            v => (v && v.length <= 100) || 'Taille de stockage must be less than 10 characters',
        ],
        marque: '',
        marqueRules: [
            v => !!v || 'Marque is required',
            v => (v && v.length <= 100) || 'Marque must be less than 10 characters',
        ],
        description: '',
        descriptionRules: [
            v => !!v || 'Description is required',
            v => (v && v.length <= 200) || 'Description must be less than 10 characters',
        ],
        degats: '',
        degatsRules: [
            v => !!v || 'Degats is required',
            v => (v && v.length <= 100) || 'Degats must be less than 10 characters',
        ],
        stockage_id:'',
        utility_id: '',
    


        checkbox: false,
    }),

    methods: {
        validate() {
            this.$refs.form.validate()
        },
        reset() {
            this.$refs.form.reset()
        },
        resetValidation() {
            this.$refs.form.resetValidation()
        },
    },
}
</script>
