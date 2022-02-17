<template>
 <v-container>

 <v-card
    class="mx-auto"
    max-width="344"
  >
    <v-card-text>
      <p class="text-h4 text--primary">
          Fiche du Matériel</p>
      <p class="text-h6 text--primary">
       Matériel : {{ 
           this.materiel.nom
       }}
      </p>
      <p class="text-h6 text--primary">
       Muméro de serie : {{ 
           this.materiel.numeroSerie
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
    </v-card-text>
  </v-card>
 </v-container>    
</template>
<script>
export default {
  props: {
   materiel: {
            type: Object,
            required: true,
        }
  },
  mounted(){
      console.log(this.materiel)
  },
    data: () => ({
        //
    }),
}
</script>
