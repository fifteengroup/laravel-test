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
                        <form action="{{route('orders')}}" method="GET" class="flex-wrap flex-row float-left"
                              role="group">
                            <div class="form-group">
                                <label for="sort">Sort By</label>
                                <select id="sort" name="sort">
                                    @foreach($sortOptions['sort'] as $label => $sortValue)
                                        <option value="{{$sortValue}}"
                                                {{ $sortValue == old('sort', $sort) ? ' selected' : ''}}>{{$label}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group flex-column">
                                <label for="order">Order</label>
                                <select id="order" name="order">
                                    @foreach($sortOptions['order'] as $label => $orderValue)
                                        <option
                                            {{ $orderValue == old('order', $order) ? ' selected' : ''}}
                                            value="{{$orderValue}}" >{{$label}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-secondary">
                                    Sort
                                </button>
                            </div>
                        </form>

                        <table class="table">
                            {{ $orders->links() }}
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Company</th>
                                <th>Items</th>
                                <th>Cost</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($orders as $order)
                                <tr>
                                    <td>{{ $order->id }}</td>
                                    <td>{{ $order->contact->company->name }}</td>
                                    <td>{{ $order->items()->count() }}</td>
                                    <td>£{{ $order->total_cost }}</td>
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
