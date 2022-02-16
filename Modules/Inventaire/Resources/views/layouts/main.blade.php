<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <div id="app">
        <v-app id="inspire" app>
            <v-navigation-drawer v-model="drawer" app class="pt-4" color="grey lighten-3" mini-variant>
                <v-avatar v-for="n in 6" :key="n" :color="`grey ${n === 1 ? 'darken' : 'lighten'}-1`"
                    :size="n === 1 ? 36 : 20" class="d-block text-center mx-auto mb-9"></v-avatar>
            </v-navigation-drawer>

            <v-main>
 
            </v-main>
        </v-app>
    </div>
    <script src="{{ mix('js/inventaire.js') }}"></script>
</body>

</html>
