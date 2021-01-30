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
                            {{ $orders->links() }}
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Company</th>
                                <th>Items</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($orders as $order)
                                <tr>
                                    <td>{{ $order->id }}</td>
                                    <td>{{ $order->contact->company->name }}</td>
                                    <td>{{ $order->items()->count() }}</td>
                                    <td><a href="{{ route('orders.edit', $order) }}"
                                           class="btn btn-primary">Edit</a></td>
                                </tr>
                            @endforeach
                            </tbody>

                        </table>

                        {{ $orders->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>



@endsection
