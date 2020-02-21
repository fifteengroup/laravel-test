@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">View Order</div>
                <div class="card-body">
                    <h4>Company</h4>
                    <p>{{ $order->company->name }}</p>
                    <hr/>
                    <h4>Contact</h4>
                    <p>{{ $order->contact->full_name }}</p>
                    <hr/>
                    <h4>Items</h4>
                    @foreach($order->items as $item)
                        <p>{{ $item->item }}</p>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
