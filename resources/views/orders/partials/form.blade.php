{{ csrf_field() }}

<div class="form-group{{ $errors->has('contact_id') ? ' has-error' : '' }}">
    <label for="contact_id" class="col-md-4 control-label">Contact</label>
    <div class="col-md-12">
        <select name="contact_id" id="contact_id" class="form-control">
            <option value="">Please select...</option>
            @foreach($contacts as $id => $fullName)
                <option value="{{ $id }}"
                        {{ $id == old('contact_id', $companyContactOrders->contact_id) ? ' selected' : ''}}>
                    {{ $fullName }}
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

<div class="form-group{{ $errors->has('product_name') ? ' has-error' : '' }}">
    <label for="product_name" class="col-md-4 control-label">Product Name</label>
    <div class="col-md-12">
        <input id="product_name" type="text" class="form-control" name="product_name"
               value="{{ old('product_name', $companyContactOrders->product_name) }}">
        @if ($errors->has('product_name'))
            <span class="help-block">
                <strong>{{ $errors->first('product_name') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('price_pennies') ? ' has-error' : '' }}">
    <label for="last_name" class="col-md-4 control-label">Price (pennies)</label>
    <div class="col-md-12">
        <input id="price_pennies" type="number" class="form-control" name="price_pennies"
               value="{{ old('price_pennies', $companyContactOrders->price_pennies) }}">
        @if ($errors->has('price_pennies'))
            <span class="help-block">
                <strong>{{ $errors->first('price_pennies') }}</strong>
            </span>
        @endif
    </div>
</div>
