@extends('inventaire::layouts.main')

@section('main')
<show-component  :materiel="{{ $materiel }}" :info="{{ $info }}" :statut="{{ $statut }}"></show-component>
@endsection
