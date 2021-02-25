{{ csrf_field() }}

<div class="form-group{{ $errors->has('contact_id') ? ' has-error' : '' }}">
    <label for="contact_id" class="col-md-4 control-label">Contact</label>
    <div class="col-md-12">
        <select name="contact_id" id="contact_id" class="form-control">
            <option value="">Please select...</option>
            @foreach($contacts as $contact)
                <option value="{{ $contact->id }}"  {{ $contact->id == old('contact_id', $address->contact_id) ? ' selected' : ''}}>
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


<div class="form-group{{ $errors->has('line_1') ? ' has-error' : '' }}">
    <label for="line_1" class="col-md-4 control-label">Line 1</label>
    <div class="col-md-12">
        <input id="line_1" type="text" class="form-control" name="line_1"
               value="{{ old('line_1', $address->line_1) }}">
        @if ($errors->has('line_1'))
            <span class="help-block">
                <strong>{{ $errors->first('line_1') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('line_1') ? ' has-error' : '' }}">
    <label for="line_2" class="col-md-4 control-label">Line 2</label>
    <div class="col-md-12">
        <input id="line_2" type="text" class="form-control" name="line_2"
               value="{{ old('line_2', $address->line_2) }}">
        @if ($errors->has('line_2'))
            <span class="help-block">
                <strong>{{ $errors->first('line_2') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('line_3') ? ' has-error' : '' }}">
    <label for="line_3" class="col-md-4 control-label">Line 3</label>
    <div class="col-md-12">
        <input id="line_3" type="text" class="form-control" name="line_3"
               value="{{ old('line_3', $address->line_3) }}">
        @if ($errors->has('line_3'))
            <span class="help-block">
                <strong>{{ $errors->first('line_3') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('town') ? ' has-error' : '' }}">
    <label for="town" class="col-md-4 control-label">Town</label>
    <div class="col-md-12">
        <input id="town" type="text" class="form-control" name="town"
               value="{{ old('town', $address->town) }}">
        @if ($errors->has('town'))
            <span class="help-block">
                <strong>{{ $errors->first('town') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('city') ? ' has-error' : '' }}">
    <label for="city" class="col-md-4 control-label">City</label>
    <div class="col-md-12">
        <input id="city" type="text" class="form-control" name="city"
               value="{{ old('city', $address->city) }}">
        @if ($errors->has('city'))
            <span class="help-block">
                <strong>{{ $errors->first('city') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('county') ? ' has-error' : '' }}">
    <label for="county" class="col-md-4 control-label">County</label>
    <div class="col-md-12">
        <input id="county" type="text" class="form-control" name="county"
               value="{{ old('county', $address->county) }}">
        @if ($errors->has('county'))
            <span class="help-block">
                <strong>{{ $errors->first('county') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('country') ? ' has-error' : '' }}">
    <label for="country" class="col-md-4 control-label">Country</label>
    <div class="col-md-12">
        <input id="country" type="text" class="form-control" name="country"
               value="{{ old('country', $address->country) }}">
        @if ($errors->has('country'))
            <span class="help-block">
                <strong>{{ $errors->first('country') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('first_name') ? ' has-error' : '' }}">
    <label for="postcode" class="col-md-4 control-label">Postcode</label>
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
