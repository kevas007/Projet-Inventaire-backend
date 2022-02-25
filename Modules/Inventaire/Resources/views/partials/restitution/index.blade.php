@extends('inventaire::layouts.main')
@section('main')
    <restitution-index :materiels="{{ $materiels }}"></restitution-index>
@endsection
