@extends('common.edit')

@section('card_header', 'Edit Order')

@section('action', route('orders.update', $order))

@section('form')
    @include('orders.partials.form')
@endsection
