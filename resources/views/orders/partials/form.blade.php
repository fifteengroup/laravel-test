{{ csrf_field() }}
<div class="form-group{{ $errors->has('product_name') ? ' has-error' : '' }}">
    <label for="product_name" class="col-md-4 control-label">Product Name</label>
    <div class="col-md-12">
        <input id="product_name" type="text" class="form-control" name="product_name"
               value="{{ old('product_name', $order->product_name) }}">
        @if ($errors->has('product_name'))
            <span class="help-block">
                <strong>{{ $errors->first('product_name') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('price') ? ' has-error' : '' }}">
    <label for="price" class="col-md-4 control-label">Price</label>
    <div class="col-md-12">
        <input id="price" type="number" class="form-control" name="price"
               step="0.01"
               value="{{ old('price', $order->price) }}">
        @if ($errors->has('price'))
            <span class="help-block">
                <strong>{{ $errors->first('price') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('quantity') ? ' has-error' : '' }}">
    <label for="quantity" class="col-md-4 control-label">Quantity</label>
    <div class="col-md-12">
        <input id="quantity" type="number" class="form-control" name="quantity"
               value="{{ old('quantity', $order->quantity) }}">
        @if ($errors->has('quantity'))
            <span class="help-block">
                <strong>{{ $errors->first('quantity') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('contact_id') ? ' has-error' : '' }}">
    <label for="contact_id" class="col-md-4 control-label">Contact</label>
    <div class="col-md-12">
        <select name="contact_id" id="contact_id" class="form-control">
            <option value="">Please select...</option>
            @foreach($contacts as $contact)
                <option value="{{ $contact->id }}"
                        {{ $contact->id == old('contact_id', $order->contact_id) ? ' selected' : ''}}>
                    {{ $contact->first_name }} {{ $contact->last_name }}
                </option>
            @endforeach
        </select>
        @if ($errors->has('contact_id'))
            <span class="help-block">
                <strong>{{ $errors->first('contact_id') }}</strong>
            </span>
        @endif
    </div>
</div>
