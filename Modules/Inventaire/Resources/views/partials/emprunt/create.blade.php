@extends('inventaire::layouts.main')
@section('main')

<emprunt-create :materiels="{{$materiels}}" :users="{{$users}}" :user="{{ Auth::user() }}"></emprunt-create>

@endsection
