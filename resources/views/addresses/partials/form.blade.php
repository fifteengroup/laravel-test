{{ csrf_field() }}
<div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
    <label for="address" class="col-md-4 control-label">Address</label>
    <div class="col-md-12">
        <input id="address" type="text" class="form-control" name="address"
               value="{{ old('address', $address->address) }}">
        @if ($errors->has('address'))
            <span class="help-block">
                <strong>{{ $errors->first('address') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('postcode') ? ' has-error' : '' }}">
    <label for="postcode" class="col-md-4 control-label">Post Code</label>
    <div class="col-md-12">
        <input id="postcode" type="text" class="form-control" name="postcode"
               value="{{ old('postcode', $address->postcode) }}">
        @if ($errors->has('postcode'))
            <span class="help-block">
                <strong>{{ $errors->first('postcode') }}</strong>
            </span>
        @endif
    </div>
</div>
<div class="form-group{{ $errors->has('contact_id') ? ' has-error' : '' }}">
    <label for="contact_id" class="col-md-4 control-label">Contact Name</label>
    <div class="col-md-12">
        <select name="contact_id" id="contact_id" class="form-control">
            <option value="">Please select...</option>
            @foreach($contacts as $id => $name)
                <option value="{{ $id }}"
                        {{ $id == old('contact_id', $address->contact_id) ? ' selected' : ''}}>
                    {{ $name }}
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
