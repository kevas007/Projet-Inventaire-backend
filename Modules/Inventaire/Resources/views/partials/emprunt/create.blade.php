@extends('inventaire::layouts.main')
@section('main')

<emprunt-create :materiels="{{$materiels}}" :users="{{$users}}"></emprunt-create>

@endsection
