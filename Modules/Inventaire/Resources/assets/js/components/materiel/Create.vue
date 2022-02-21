<template>
    <v-container>
        <v-form
            ref="form"
            v-model="valid"
            action="/inventaire/materiel/create"
            method="POST"
            lazy-validation
        >
            <input type="hidden" name="_token" :value="csrf" />
            <v-text-field
                name="nom"
                v-model="nom"
                :counter="30"
                :rules="nomRules"
                label="Name"
                required
            ></v-text-field>

            <v-text-field
                :counter="100"
                v-model="numero_serie"
                :rules="numero_serieRules"
                label="Numero  de serie"
                name="numero_serie"
                required
            ></v-text-field>

            <v-select
                v-model="statut_id"
                :items="this.statut"
                name="statut_id"
                item-value="id"
                item-text="nom"
                label="Statut"
                required
            ></v-select>
            <v-select
                v-model="utility_id"
                name="utility_id"
                :items="this.utility"
                item-value="id"
                item-text="nom"
                label="Utility"
                required
            ></v-select>

            <v-select
                v-model="type_id"
                name="type_id"
                :items="this.type"
                item-value="id"
                item-text="nom"
                label="Type"
                required
            ></v-select>

            <v-select
                v-model="place_id"
                name="place_id"
                :items="this.place"
                item-value="id"
                item-text="nom"
                label="Place"
                required
            ></v-select>
                <v-select
                v-model="stockage_id"
                name="stockage_id"
                :items="this.stockage"
                item-value="id"
                item-text="nom"
                label="Stockage"
                required
            ></v-select>

            <!-- <v-text-field :counter="100" v-model="duree" :rules="dureeRules" label="Durée" required></v-text-field> -->
            <v-text-field
                :counter="100"
                v-model="processeur"
                :rules="processeurRules"
                label="Processeur"
                name="processeur"
                required
            ></v-text-field>
            <v-text-field
                name="ram"
                :counter="50"
                v-model="ram"
                :rules="ramRules"
                label="Ram"
                required
            ></v-text-field>
            <v-text-field
                :counter="100"
                v-model="taille_stockage"
                :rules="taille_stockageRules"
                label="Taille de stcokage"
                name="taille_stockage"
                required
            ></v-text-field>
            <v-text-field
                :counter="100"
                v-model="marque"
                :rules="marqueRules"
                label="Marque"
                name="marque"
                required
            ></v-text-field>
            <v-text-field
                :counter="200"
                v-model="description"
                :rules="descriptionRules"
                label="Description"
                name="description"
                required
            ></v-text-field>
            <v-text-field
                :counter="100"
                v-model="degats"
                :rules="degatsRules"
                label="Degats"
                name="degats"
                required
            ></v-text-field>
            <!-- <v-date-picker v-model="duree"  name="duree" v-if="statut_id ==2 || statut_id==3"></v-date-picker> -->
            <!-- <v-select v-model="type_id" :menu-props="{ auto: true, overflowY: true }" :items="this.type" label="Type"  item-value="id" item-text="nom" required></v-select> -->

            <v-btn
                :disabled="!valid"
                color="success"
                type="submit"
                class="mr-4"
                @click="validate"
            >Validate</v-btn>

            <v-btn color="error" class="mr-4" @click="reset">Reset Form</v-btn>

            <v-btn color="warning" @click="resetValidation">Reset Validation</v-btn>
        </v-form>
    </v-container>
</template>
<script>
export default {
    mounted() {
        console.log(this.utility)
    },
    props: {
        utility: {
            type: Array,
                required: true,
        },
        statut: {
            type: Array,
            required: true,
        },
        type: {
            type: Array,
            required: true,
        },
        info: {
            type: Array,
            required: true,
        },
        place: {
            type: Array,
            required: true,
        },
        stockage: {
            type: Array,
            required: true,
        }
    },
    data: () => ({
        csrf: document
            .querySelector('meta[name="csrf-token"]')
            .getAttribute("content"),
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
        statut_id: '',

        type_id: '',

        place_id: '',

        // duree: '',
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
        stockage_id: '',
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
