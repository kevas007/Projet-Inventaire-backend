@extends('inventaire::layouts.main')

@section('main')
    <show-component :materiel="{{ $materiel }}" :info="{{ $info }}" :statut="{{ $statut }}" :user="{{ Auth::user() }}">
    </show-component>
@endsection
