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
                            Address List for {{ $contact->name }}
                        </h2>

                    </div>

                    <div class="card-body">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Address</th>
                                <th>Postcode</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($addresses as $address)
                                <tr>
                                    <td>{{ $address->id }}</td>
                                    <td>{{ $address->address }}</td>
                                    <td>{{ $address->postcode }}</td>
                                    <td><a href="{{ route('addresses.edit', $address) }}" class="btn btn-primary">Edit</a></td>
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
