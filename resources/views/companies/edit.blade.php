@extends('common.edit')

@section('card_header', 'Edit Company')

@section('action', route('companies.update', $company))

@section('form')
    @include('companies.partials.form')
@endsection
