{{ csrf_field() }}

<div class="form-group{{ $errors->has('product_name') ? ' has-error' : '' }}">
    <label for="product_name" class="col-md-4 control-label">Product name</label>
    <div class="col-md-12">
        <input id="product_name" type="text" class="form-control" name="product_name"
               value="{{ old('product_name', $item->product_name) }}">
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
               value="{{ old('price', $item->price) }}">
        @if ($errors->has('price'))
            <span class="help-block">
                <strong>{{ $errors->first('price') }}</strong>
            </span>
        @endif
    </div>
</div>
