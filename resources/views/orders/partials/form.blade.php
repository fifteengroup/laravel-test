{{ csrf_field() }}

<div class="form-group{{ $errors->has('contact_id') ? ' has-error' : '' }}">
    <label for="contact_id" class="col-md-4 control-label">Contact</label>
    <div class="col-md-12">
        <select name="contact_id" id="contact_id" class="form-control">
            <option value="">Please select...</option>
            @foreach($contacts as $contact)
                <option value="{{ $contact->id }}"  {{ $contact->id == old('contact_id', $order->contact_id) ? ' selected' : ''}}>
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

<div class="form-group{{ $errors->has('items') ? ' has-error' : '' }}">
    <label>Items</label>
    <select name="items[]" multiple id="items" class="form-control">
        @foreach($items as $item)
            <option value="{{ $item->id }}" {{ $order->items->contains('id', $item->id) ? ' selected' : '' }}>
                {{ $item->product_name }}
            </option>
        @endforeach
    </select>
    @if ($errors->has('items'))
        <span class="help-block">
            <strong>{{ $errors->first('items') }}</strong>
        </span>
    @endif
</div>


