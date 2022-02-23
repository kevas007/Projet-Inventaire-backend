@extends('inventaire::layouts.main')

@section('main')
  <contrat-edit :edit="{{ $edit }}" :statut="{{ $statut }}"></contrat-edit>
@endsection
