@extends('inventaire::layouts.main')

@section('main')
  <show-component  :materiel="{{ $materiel }}"></-component>
@endsection
