@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <div class="btn-group float-right" role="group">
                            <a href="{{ route('orders.create') }}" class="btn btn-success">Add new</a>
                        </div>
                        <h2>
                            Orders
                        </h2>
                    </div>

                    <div class="card-body">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>@sortablelink('id', 'Order No#')</th>
                                <th>@sortablelink('status')</th>
                                <th>Name</th>
                                <th>Company</th>
                                <th>@sortablelink('item_count', 'Item Count')</th>
                                <th>@sortablelink('total', 'Total (£)')</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($orders as $order)
                                <tr>
                                    <td>{{ $order->id }}</td>
                                    <td>{{ $order->status }}</td>
                                    <td>{{ $order->contact->first_name }} {{ $order->contact->last_name }}</td>
                                    <td>{{ $order->contact->company->name }}</td>
                                    <td>{{ $order->item_count }}</td>
                                    <td>{{ $order->total }}</td>
                                    <td>
                                        <a href="{{ route('orders.show', $order) }}" class="btn btn-primary">
                                            @if($order->status === 'Complete')
                                                View
                                            @elseif($order->status === 'Ready to process' || $order->status === 'Ready to despatch')
                                                Action Required
                                            @else
                                                Add Items
                                            @endif
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        {!! $orders->appends(\Request::except('page'))->render() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>



@endsection
