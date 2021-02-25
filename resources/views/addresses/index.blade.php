@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <div class="btn-group float-right" role="group">
                            <a href="{{ route('addresses.create') }}" class="btn btn-success">Add new</a>
                        </div>
                        <h2>
                            Addresses
                        </h2>

                    </div>

                    <div class="card-body">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Address</th>
                                <th>Town</th>
                                <th>City</th>
                                <th>County</th>
                                <th>Country</th>
                                <th>Postcode</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($addresses as $address)
                                <tr>
                                    <td>{{ $address->id }}</td>
                                    <td>
                                        {{ $address->line_1 }}<br>
                                        {{ $address->line_2 }}<br>
                                        {{ $address->line_3 }}                                    
                                    </td>
                                    <td>{{ $address->town }}</td>
                                    <td>{{ $address->city }}</td>
                                    <td>{{ $address->county }}</td>
                                    <td>{{ $address->country }}</td>
                                    <td>{{ $address->postcode }}</td>
                                    <td><a href="{{ route('addresses.edit', $address) }}"
                                           class="btn btn-primary">Edit</a></td>
                                </tr>
                            @endforeach

                            {{ $addresses->links() }}
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection