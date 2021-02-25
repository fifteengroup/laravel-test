@extends('common.create')

@section('card_header', 'Create Contact')

@section('action', route('contacts.create'))

@section('form')
    @include('contacts.partials.form')
@endsection
