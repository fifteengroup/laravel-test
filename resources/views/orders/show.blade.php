@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        @if($order->status === 'Ready to process')
                            <div class="btn-group float-right" role="group">
                                <a href="{{ route('orders.updateStatusReadyToDespatch', $order) }}" class="btn btn-success">Mark order as Ready to despatch</a>
                            </div>
                        @endif
                        @if($order->status === 'Ready to despatch')
                            <div class="btn-group float-right" role="group">
                                <a href="{{ route('orders.updateStatusComplete', $order) }}" class="btn btn-success">Mark order as Complete</a>
                            </div>
                        @endif
                        <h2>
                            Details for Order No# {{ $order->id }}
                        </h2>
                    </div>

                    <div class="card-body">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>Order No#</th>
                                <th>Status</th>
                                <th>Name</th>
                                <th>Company</th>
                                <th>item count</th>
                                <th>total (£)</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>{{ $order->id }}</td>
                                <td>{{ $order->status }}</td>
                                <td>{{ $order->contact->first_name }} {{ $order->contact->last_name }}</td>
                                <td>{{ $order->contact->company->name }}</td>
                                <td>{{ $order->item_count }}</td>
                                <td>{{ $order->total }}</td>
                            </tr>

                            </tbody>
                        </table>
                    </div>

                </div>

                <p></p>

                <div class="card">
                    <div class="card-header">
                        @if($order->status !== 'Complete' && $order->status !== 'Ready to despatch')
                            <div class="btn-group float-right" role="group">
                                <a href="{{ route('orderItems.create', $order->id) }}" class="btn btn-success">Add Order Item</a>
                            </div>
                        @endif
                        <h2>
                            @if($order->status !== 'Complete' && $order->status !== 'Ready to despatch')
                                Add
                            @endif
                                Order Items
                        </h2>
                    </div>

                    <div class="card-body">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>Item Id#</th>
                                <th>Product Name</th>
                                <th>Purchase Quantity</th>
                                <th>Purchase Price</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($order->items as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->quantity }}</td>
                                    <td>{{ $item->amount }}</td>
                                </tr>
                            @endforeach

                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>



@endsection
