@extends('inventaire::layouts.main')
@section('main')

<reservation-create :materiel="{{$materiel}}" :utilities="{{$utilities}}"></reservation-create>

@endsection
