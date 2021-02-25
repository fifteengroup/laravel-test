@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <div class="btn-group float-right" role="group">
                            <a href="{{ route('order-items.create') }}" class="btn btn-success">Add new</a>
                        </div>
                        <h2>
                            Order Items
                        </h2>

                    </div>

                    <div class="card-body">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>Product Name</th>
                                <th>Price</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($order_items as $order_item)
                                <tr>
                                    <td>{{ $order_item->product_name }}</td>
                                    <td>£{{ $order_item->price }}</td>
                                    <td><a href="{{ route('order-items.edit', $order_item) }}"
                                           class="btn btn-primary">Edit</a></td>
                                </tr>
                            @endforeach

                            {{ $order_items->links() }}
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection