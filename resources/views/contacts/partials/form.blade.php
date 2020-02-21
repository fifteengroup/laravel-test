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
        <input id="last_name" type="text" class="form-control" name="last_name"
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

<hr>
@if($contact->contactAddresses()->exists())
    <h4>Contact Addresses</h4>
    @foreach($contact->contactAddresses as $contactAddress)
        <p>
            {{ $contactAddress->first_line }},
            {{ $contactAddress->second_line }},
            {{ $contactAddress->third_line }},
            {{ $contactAddress->postcode }}
        </p>
    @endforeach
    <h3>Add new address</h3>
@else
    <h3>Contact Address</h3>
@endif
<div class="form-group">
    <label for="first_line" class="col-md-4 control-label">Address Line One</label>
    <div class="col-md-12">
        <input id="first_line" type="text" class="form-control" name="first_line" value="{{ old('first_line') }}">
    </div>
</div>
<div class="form-group">
    <label for="second_line" class="col-md-4 control-label">Address Line Two</label>
    <div class="col-md-12">
        <input id="second_line" type="text" class="form-control" name="second_line" value="{{ old('second_line') }}">
    </div>
</div>
<div class="form-group{{ $errors->has('third_line') ? ' has-error' : '' }}">
    <label for="third_line" class="col-md-4 control-label">Address Line Three</label>
    <div class="col-md-12">
        <input id="first_name" type="text" class="form-control" name="third_line" value="{{ old('third_line') }}">
    </div>
</div>
<div class="form-group">
    <label for="postcode" class="col-md-4 control-label">Address Postcode</label>
    <div class="col-md-12">
        <input id="postcode" type="text" class="form-control" name="postcode" value="{{ old('postcode') }}">
    </div>
</div>