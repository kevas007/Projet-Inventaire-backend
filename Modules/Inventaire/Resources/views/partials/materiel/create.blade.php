@extends('inventaire::layouts.main')

@section('main')
<h1>
Ajouter
    un materiel
</h1>
{{-- {{ dd("choco") }} --}}
<create-component :utility="{{ $utility }}" :statut="{{ $statut }}" :type="{{ $type }}" :info="{{ $info }}" :place="{{ $place }}" :stockage="{{ $stockage }}"></create-component>
@endsection
