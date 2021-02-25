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
                            @foreach($addresses as $contact)
                                <tr>
                                    <td>{{ $contact->id }}</td>
                                    <td>
                                        {{ $contact->line_1 }}<br>
                                        {{ $contact->line_2 }}<br>
                                        {{ $contact->line_3 }}                                    
                                    </td>
                                    <td>{{ $contact->town }}</td>
                                    <td>{{ $contact->city }}</td>
                                    <td>{{ $contact->county }}</td>
                                    <td>{{ $contact->country }}</td>
                                    <td>{{ $contact->postcode }}</td>
                                    <td><a href="{{ route('addresses.edit', $contact) }}"
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