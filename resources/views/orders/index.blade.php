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
                                <th>#</th>
                                <th>Name</th>
                                <th>Product Name</th>
                                <th>Price (pennies)</th>
                                <th>Company</th>
                                <th>Company Status</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($companyContactOrders as $order)
                                <tr>
                                    <td>{{ $order->id }}</td>
                                    <td>{{ $order->contact->first_name }} {{ $order->contact->last_name }}</td>
                                    <td>{{ $order->product_name }}</td>
                                    <td>{{ $order->price_pennies }}</td>
                                    <td>{{ $order->contact->company->name }} ({{ $order->contact->company->companyType->name }})</td>
                                    <td>{{ $order->contact->company->companyStatus->name }}</td>
                                    <td><a href="{{ route('orders.edit', $order) }}"
                                           class="btn btn-primary">Edit</a></td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        {{ $companyContactOrders->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>



@endsection
