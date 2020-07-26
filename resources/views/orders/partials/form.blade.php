{{ csrf_field() }}
<div class="form-group{{ $errors->has('contact_id') ? ' has-error' : '' }}">
    <label for="contact_id" class="col-md-4 control-label">Contact Name</label>
    <div class="col-md-12">
        <select name="contact_id" id="contact_id" class="form-control">
            <option value="">Please select...</option>
            @foreach($contacts as $id => $name)
                <option value="{{ $id }}"
                    {{ $id == old('contact_id', $order->contact_id) ? ' selected' : ''}}>
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
<input type="hidden" name="status" value="Order items to be added">
<input type="hidden" name="item_count" value="0">
<input type="hidden" name="total" value="0.00">
