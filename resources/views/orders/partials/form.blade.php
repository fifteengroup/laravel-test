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

<div class="form-group{{ $errors->has('order_items') ? ' has-error' : '' }}">
    <label>Items</label>
    <select name="order_items[]" multiple id="order_items" class="form-control">
        @foreach($order_items as $order_item)
            <option value="{{ $order_item->id }}" {{ $order->order_items->contains('id', $order_item->id) ? ' selected' : '' }}>
                {{ $order_item->product_name }}
            </option>
        @endforeach
    </select>
    @if ($errors->has('order_items'))
        <span class="help-block">
            <strong>{{ $errors->first('order_items') }}</strong>
        </span>
    @endif
</div>


