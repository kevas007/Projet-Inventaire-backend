@extends('inventaire::layouts.main')

@section('main')
    <index-component :materiels="{{ $materiels }}"></index-component>
@endsection
