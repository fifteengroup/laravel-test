{{ csrf_field() }}
<div class="form-group{{ $errors->has('first_name') ? ' has-error' : '' }}">
    <label for="first_name" class="col-md-4 control-label">First Name</label>
    <div class="col-md-12">
        <input id="first_name" type="text" class="form-control" name="first_name"
               value="{{ old('first_name', $contact->first_name) }}">
        @if ($errors->has('first_name'))
            <span class="help-block">
                <strong>{{ $errors->first('first_name') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('last_name') ? ' has-error' : '' }}">
    <label for="last_name" class="col-md-4 control-label">Last Name</label>
    <div class="col-md-12">
        <input id="first_name" type="text" class="form-control" name="last_name"
               value="{{ old('last_name', $contact->last_name) }}">
        @if ($errors->has('last_name'))
            <span class="help-block">
                <strong>{{ $errors->first('last_name') }}</strong>
            </span>
        @endif
    </div>
</div>
<div class="form-group{{ $errors->has('company_id') ? ' has-error' : '' }}">
    <label for="company_id" class="col-md-4 control-label">Company</label>
    <div class="col-md-12">
        <select name="company_id" id="company_id" class="form-control">
            <option value="">Please select...</option>
            @foreach($companies as $id => $name)
                <option value="{{ $id }}"
                        {{ $id == old('company_id', $contact->company_id) ? ' selected' : ''}}>
                    {{ $name }}
                </option>
            @endforeach
        </select>
        @if ($errors->has('company_id'))
            <span class="help-block">
                <strong>{{ $errors->first('company_id') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('contact_role_id') ? ' has-error' : '' }}">
    <label for="contact_role_id" class="col-md-4 control-label">Contact Role</label>
    <div class="col-md-12">
        <select name="contact_role_id" id="contact_role_id" class="form-control">
            <option value="">Please select...</option>
            @foreach($contactRoles as $id => $name)
                <option value="{{ $id }}"
                        {{ $id == old('contact_role_id', $contact->contact_role_id) ? ' selected' : ''}}>
                    {{ $name }}
                </option>
            @endforeach
        </select>
        @if ($errors->has('contact_role_id'))
            <span class="help-block">
                <strong>{{ $errors->first('contact_role_id') }}</strong>
            </span>
        @endif
    </div>
</div>
<div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
    <label for="address" class="col-md-4 control-label">Address</label>
    <div class="col-md-12">
        <textarea name="address[]" id="inputAddress" class="form-control" rows="3" required="required">
            {{ old('first_name') }}
        </textarea>
        @if ($errors->has('address'))
            <span class="help-block">
                <strong>{{ $errors->first('address') }}</strong>
            </span>
        @endif
    </div>
</div>
<div class="form-group{{ $errors->has('post_code') ? ' has-error' : '' }}">
    <label for="post_code" class="col-md-4 control-label">Post Code</label>
    <div class="col-md-12">
        <input id="post_code" type="text" class="form-control" name="post_code[]"
               value="{{ old('post_code') }}">
        @if ($errors->has('post_code'))
            <span class="help-block">
                <strong>{{ $errors->first('post_code') }}</strong>
            </span>
        @endif
    </div>
</div>
@foreach($contact->addresses as $value)
    <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
        <label for="address" class="col-md-4 control-label">Address</label>
        <div class="col-md-12">
            <textarea name="address[]" id="inputAddress" class="form-control" rows="3" required="required">
                {{ old('address', $value->address) }}
            </textarea>
            @if ($errors->has('address'))
                <span class="help-block">
                    <strong>{{ $errors->first('address') }}</strong>
                </span>
            @endif
        </div>
    </div>
    <div class="form-group{{ $errors->has('post_code') ? ' has-error' : '' }}">
        <label for="post_code" class="col-md-4 control-label">Post Code</label>
        <div class="col-md-12">
            <input id="post_code" type="text" class="form-control" name="post_code[]"
                   value="{{ old('post_code', $value->post_code) }}">
            @if ($errors->has('post_code'))
                <span class="help-block">
                    <strong>{{ $errors->first('post_code') }}</strong>
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
        <a href="#" class="add_more_address_button">+ Add More Addresses</a>
    </div>
</div>

