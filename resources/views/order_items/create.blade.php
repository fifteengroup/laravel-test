@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Add Order Item for Order No#{{ $order->id }}</div>
                <div class="card-body">
                    <form class="form-horizontal" method="POST" action="{{ route('orderItems.store', $order->id) }}">
                        @include('order_items.partials.form')
                        <div class="form-group">
                            <div class="col-md-6">
                                <button type="submit" class="btn btn-primary">
                                    Add Order Item
                                </button>
                            </div>
                        </div>
                    </form>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
