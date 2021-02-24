@extends('common.create')

@section('card_header', 'Create Company')

@section('action', route('companies.create'))

@section('form')
    @include('companies.partials.form')
@endsection
