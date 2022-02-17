<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <div id="app">
        <v-app id="inspire" app>
            <inventaire-component></inventaire-component>
            <v-main app>
                @yield('main')
            </v-main>
        </v-app>
    </div>
    <script src="{{ mix('js/inventaire.js') }}"></script>
</body>

</html>
