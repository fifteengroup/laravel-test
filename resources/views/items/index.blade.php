@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <div class="btn-group float-right" role="group">
                            <a href="{{ route('items.create') }}" class="btn btn-success">Add new</a>
                        </div>
                        <h2>
                            Items
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
                            @foreach($items as $item)
                                <tr>
                                    <td>{{ $item->product_name }}</td>
                                    <td>£{{ $item->price }}</td>
                                    <td>
                                        <a href="{{ route('items.edit', $item) }}" class="btn btn-primary">
                                            Edit
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                        {{ $items->links() }}

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection