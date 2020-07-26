{{ csrf_field() }}
<input type="hidden" name="order_id" value="{{ $order->id }}">
<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
    <label for="name" class="col-md-4 control-label">Item Name</label>
    <div class="col-md-12">
        <input id="name" type="text" class="form-control" name="name"
               value="{{ old('name', $orderItem->name) }}">
        @if ($errors->has('name'))
            <span class="help-block">
                <strong>{{ $errors->first('name') }}</strong>
            </span>
        @endif
    </div>
</div>
<div class="form-group{{ $errors->has('quantity') ? ' has-error' : '' }}">
    <label for="quantity" class="col-md-4 control-label">Quantity</label>
    <div class="col-md-12">
        <input id="quantity" type="number" class="form-control" name="quantity"
               value="{{ old('quantity', $orderItem->quantity) }}">
        @if ($errors->has('quantity'))
            <span class="help-block">
                <strong>{{ $errors->first('quantity') }}</strong>
            </span>
        @endif
    </div>
</div>
<div class="form-group{{ $errors->has('amount') ? ' has-error' : '' }}">
    <label for="amount" class="col-md-4 control-label">Total Amount</label>
    <div class="col-md-12">
        <input id="amount" type="number" class="form-control" name="amount" step="0.01"
               value="{{ old('amount', $orderItem->amount) }}">
        @if ($errors->has('amount'))
            <span class="help-block">
                <strong>{{ $errors->first('amount') }}</strong>
            </span>
        @endif
    </div>
</div>
