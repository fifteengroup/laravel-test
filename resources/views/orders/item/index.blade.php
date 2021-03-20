@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <div class="btn-group float-right" role="group">
                            <a href="{{ route('orders.create') }}" class="btn btn-success">Add new order</a>
                        </div>
                        <div class="btn-group float-left" role="group">
                            <a href="{{ route('orders') }}" class="btn btn-info" style="color: white;"><< Back</a>
                        </div>
                        <h2>
                            Order (#{{$order->unique_number}}) Items
                        </h2>
                    </div>

                    <div class="card-body">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Item / Product Name</th>
                                <th>Product Price</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($items as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->product_name }}</td>
                                    <td>{{ number_format($item->price, 2) }}</td>
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
