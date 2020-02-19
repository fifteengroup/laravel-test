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

<div class="form-group{{ $errors->has('first_line_address') ? ' has-error' : '' }}">
    <label for="first_line_address" class="col-md-4 control-label">First Line of Address</label>
    <div class="col-md-12">
        <input id="first_line_address" type="text" class="form-control" name="first_line_address"
               value="{{ old('first_line_address', $contact->first_line_address) }}">
        @if ($errors->has('first_line_address'))
            <span class="help-block">
                <strong>{{ $errors->first('first_line_address') }}</strong>
            </span>
        @endif
    </div>
</div>
<div class="form-group{{ $errors->has('second_line_address') ? ' has-error' : '' }}">
    <label for="second_line_address" class="col-md-4 control-label">Second Line of Address</label>
    <div class="col-md-12">
        <input id="second_line_address" type="text" class="form-control" name="second_line_address"
               value="{{ old('second_line_address', $contact->second_line_address) }}">
        @if ($errors->has('second_line_address'))
            <span class="help-block">
                <strong>{{ $errors->first('second_line_address') }}</strong>
            </span>
        @endif
    </div>
</div>
<div class="form-group{{ $errors->has('post_code') ? ' has-error' : '' }}">
    <label for="post_code" class="col-md-4 control-label">Post Code of Address</label>
    <div class="col-md-12">
        <input id="post_code" type="text" class="form-control" name="post_code"
               value="{{ old('post_code', $contact->post_code) }}">
        @if ($errors->has('post_code'))
            <span class="help-block">
                <strong>{{ $errors->first('post_code') }}</strong>
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