@extends('inventaire::layouts.main')

@section('main')
    <v-container class="text-center">
        <h1>Welcome {{Auth::user()->firstname}}</h1>
    </v-container>
@endsection
