<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<body>
    <div id="app">
        <v-app id="inspire" app>
            <inventaire-component :user="{{ Auth::user() }}"></inventaire-component>
            <v-main app>
                @if (Session::has('msg'))
                    <v-alert dismissible>{{ Session::get('msg') }}</v-alert>
                @endif
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                @yield('main')
            </v-main>
        </v-app>
    </div>
    <script src="{{ mix('js/inventaire.js') }}"></script>
</body>

</html>
