@extends('inventaire::layouts.main')

@section('main')
  <show-component  :materiel="{{ $materiel }}" :info="{{ $info }}"></-component>
@endsection
