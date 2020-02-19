@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <div class="btn-group float-right" role="group">
                            <a href="{{ route('orders-create') }}" class="btn btn-success">Add new</a>
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
                                <th>Description</th>
                                <th>Company</th>
                                <th>Company Contact</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($orders as $order)
                                <tr>
                                    <td>{{ $order->id }}</td>
                                    <td>{{ $order->name }}</td>
                                    <td>{{ $order->description }}</td>
                                    <td>{{ $order->company->name }}</td>
                                    <td>{{ $order->contact->first_name }} {{ $order->contact->last_name}}</td>
                                    <td><a href="{{ route('orders-edit', $order) }}"
                                           class="btn btn-primary">Edit</a></td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Description</th>
                                    <th>Company</th>
                                    <th>Company Contact</th>
                                    <th>Quantity</th>
                                    <th>Date Placed</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($orderten as $order)
                                    <tr>
                                        <td>{{ $order->id }}</td>
                                        <td>{{ $order->name }}</td>
                                        <td>{{ $order->description }}</td>
                                        <td>{{ $order->company->name }}</td>
                                        <td>{{ $order->contact->first_name }} {{ $order->contact->last_name }}</td>
                                        <td>{{ $order->quantity }}</td>
                                        <td>{{ $order->created_at }} </td>
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
