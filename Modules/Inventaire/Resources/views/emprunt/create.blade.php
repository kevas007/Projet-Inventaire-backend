@extends('inventaire::layouts.main')
@section('main')

<emprunt-create :id="{{$id}}" :users="{{$users}}"></emprunt-create>

@endsection
