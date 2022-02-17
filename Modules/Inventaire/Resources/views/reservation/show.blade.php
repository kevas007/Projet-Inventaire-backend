@extends('inventaire::layouts.main')
@section('main')

<reservation-show :materiel="{{$materiel}}" :utilities="{{$utilities}}"></reservation-show>

@endsection
