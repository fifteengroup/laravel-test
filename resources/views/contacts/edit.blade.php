@extends('common.edit')

@section('card_header', 'Edit Contact')

@section('action', route('contacts.update', $contact))

@section('form')
    @include('contacts.partials.form')
@endsection
