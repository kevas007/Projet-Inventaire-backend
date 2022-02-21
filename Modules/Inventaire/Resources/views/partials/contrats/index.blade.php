@extends('inventaire::layouts.main')

@section('main')
  <contrat-index :materiels="{{ $materiels }}" :contrats="{{ $contrats }}"></contrat-index>
@endsection
