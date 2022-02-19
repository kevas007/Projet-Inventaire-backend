<template>
    <v-container fluid grid-list-xl>
        <v-layout row wrap>
        <v-flex d-flex lg12 sm12 xs12>
        <v-card style="margin-bottom: 150px;">
            <v-toolbar color="cyan" dark>

            <v-toolbar-title>Contrat</v-toolbar-title>

            <v-spacer></v-spacer>

            <v-btn>
            </v-btn>
            </v-toolbar>

            <v-list two-line>
            <template v-for="(item, index) in items">
                <v-subheader
                v-if="item.header"
                :key="item.header"
                >
                {{ item.header }}
                </v-subheader>

                <v-divider
                v-else-if="item.divider"
                :key="index"
                :inset="item.inset"
                ></v-divider>

                <v-list-tile
                v-else
                :key="item.title"
                avatar
                @click="openDetail"
                >
                    <v-list-tile-avatar>
                        <img :src="item.avatar">
                    </v-list-tile-avatar>

                    <v-list-tile-content>
                        <v-list-tile-title v-html="item.title"></v-list-tile-title>
                        <v-list-tile-sub-title v-html="item.subtitle"></v-list-tile-sub-title>
                    </v-list-tile-content>
                </v-list-tile>

                <v-select
                v-model="select"
                :items="items"
                :rules="[v => !!v || 'Item is required']"
                label="Item"
                required 
                ></v-select>

            </template>
            </v-list>
        </v-card>
        </v-flex>
        </v-layout>
    </v-container>
</template>

<script>
export default {
    data() {
        return {
        items: [
            { header: 'Détails du contrat' },
            {
            avatar: 'https://cdn.vuetifyjs.com/images/lists/1.jpg',
            title: "Lead",
            subtitle: "Nom du lead",
            },
            { divider: true, inset: true },
            {
            avatar: 'https://cdn.vuetifyjs.com/images/lists/2.jpg',
            title: "Informations de l'emprunteur",
            subtitle: "Nom",
            subtitle: "Prénom",
            subtitle: "Date de naissance",
            subtitle: "Formation",
            subtitle: "Adresse",
            },
            { divider: true, inset: true },
            {
            title: "Matériel",
            subtitle: "Nom du matériel",
            subtitle: "token",
            },
            { divider: true, inset: true },
            {
            title: "Place",
            subtitle: "Endroit de la réservation",
            },
            { divider: true, inset: true },
            {
            title: 'Date de réservation',
            subtitle: "Du ... au ...",
            },
            { divider: true, inset: true },
            {
            title: 'Utilité',
            subtitle: "",
            },
            { divider: true, inset: true },
            {
            title: "Statut de l'emprunt",
            subtitle: "",
            }
        ],
        select: null,
        items: [
            'Item 1',
            'Item 2',
            'Item 3',
            'Item 4'
        ],
        }
    },
    methods: {
        openDetail() {
        const vm = this;
        
        }
    }
}
</script>

<style>
</style>