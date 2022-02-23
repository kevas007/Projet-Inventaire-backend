@extends('inventaire::layouts.main')

@section('main')
  <contrat-index :contrats="{{ $contrats }}"></contrat-index>
@endsection
{{-- 
@section('js')
<script src="https://cdn.lordicon.com/lusqsztk.js"></script>
@endsection --}}
