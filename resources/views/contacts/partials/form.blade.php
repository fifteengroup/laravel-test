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

<div class="form-group{{ $errors->has('contact_addresses') ? ' has-error' : '' }}">
    <label for="contact_addresses" class="col-md-4 control-label">Contact Addresses</label>
    <div class="col-md-12">
        <div class="d-flex">
            <input type="text" name="address" id="address" class="form-control" value="">
            <button type="button" id="addAddress" class="btn btn-success">
                Add
            </button>
        </div>
    </div>
    <div class="contact-addresses col-md-12">
        @foreach($contact->contactAddresses as $id => $contactAddress)
            <div class="contact-address d-flex">
                <input type="text" name="addresses[]" class="address form-control" value="{{ $contactAddress->address }}">
                <button type="button" class="delete-address btn btn-danger">
                    Delete
                </button>
            </div>
        @endforeach
    </div>
    <div id="contactAddressTemplate" class="d-none">
        <div class="contact-address d-flex">
            <input type="text" name="addresses[]" class="address form-control" value="">
            <button type="button" class="delete-address btn btn-danger">
                Delete
            </button>
        </div>
    </div>
</div>

<script type="text/javascript">
    document.addEventListener('DOMContentLoaded', function() {
        var contactAddressTemplate = $('#contactAddressTemplate').children().clone();
        $('#contactAddressTemplate').remove();

        function addAddress() {
            var address = $('#address'),
                contactAddress = contactAddressTemplate.clone().find('.address').val(address.val());
            $('.contact-addresses').prepend(contactAddress);
            address.val('');
        }

        $(document).on('click', '#addAddress', addAddress);
        $('#address').keydown(function(e) {
            if (e.keyCode === 13) { // Enter key
                e.preventDefault();
                addAddress();
            }
        });

        $(document).on('click', '.delete-address', function(event) {
            $(this).closest('.contact-address').remove();
        });
    });
</script>
