@extends('common.create')

@section('card_header', 'Create Order')

@section('action', route('orders.create'))

@section('form')
    @include('orders.partials.form')
@endsection
