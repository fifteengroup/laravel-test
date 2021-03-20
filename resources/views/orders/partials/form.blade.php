{{ csrf_field() }}
<div class="form-group{{ $errors->has('contact_id') ? ' has-error' : '' }}">
    <label for="contact_id" class="col-md-4 control-label">Contact</label>
    <div class="col-md-12">
        <select name="contact_id" id="contact_id" class="form-control">
            <option value="">Please select...</option>
            @foreach($contacts as $name)
                <option value="{{ $name->id }}"
                        {{ $name->id == old('contact_id') ? ' selected' : ''}}>
                    {{ $name->first_name." ".$name->last_name }}
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
<div class="form-group{{ $errors->has('unique_number') ? ' has-error' : '' }}">
    <label for="unique_number" class="col-md-6 control-label">Order Number <span style="color:red;">(must be unique)</span></label>
    <div class="col-md-12">
        <input id="unique_number" type="text" class="form-control" name="unique_number"
               value="{{ old('unique_number') }}">
        @if ($errors->has('unique_number'))
            <span class="help-block">
                <strong>{{ $errors->first('unique_number') }}</strong>
            </span>
        @endif
    </div>
</div>
<div class="form-group{{ $errors->has('product_name') ? ' has-error' : '' }}">
    <label for="product_name" class="col-md-4 control-label">Item/Product Name</label>
    <div class="col-md-12">
        <input id="product_name" type="text" class="form-control" name="product_name[]" value="">
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
        <input id="price" type="text" class="form-control" name="price[]"
               value="">
        @if ($errors->has('price'))
            <span class="help-block">
                <strong>{{ $errors->first('price') }}</strong>
            </span>
        @endif
    </div>
</div>


@foreach($order->items as $value)
    <div class="form-group{{ $errors->has('product_name') ? ' has-error' : '' }}">
        <label for="product_name" class="col-md-4 control-label">Item/Product Name</label>
        <div class="col-md-12">
            <input id="product_name" type="text" class="form-control" name="product_name[]"
           value="">
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
            <input id="price" type="text" class="form-control" name="price[]"
                   value="">
            @if ($errors->has('price'))
                <span class="help-block">
                    <strong>{{ $errors->first('price') }}</strong>
                </span>
            @endif
        </div>
    </div>
@endforeach


<div class="more_address_fields_wrapper">
</div>
<div class="row">
    <div class="col-md-9">
    </div>
    <div class="col-md-3">
        <a href="#" class="add_more_address_button">+ Add More Items</a>
    </div>
</div>

