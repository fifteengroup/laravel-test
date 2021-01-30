{{ csrf_field() }}
<div class="form-group{{ $errors->has('contact_id') ? ' has-error' : '' }}">
    <label for="contact_id" class="col-md-4 control-label">Company</label>
    <div class="col-md-12">
        <select name="contact_id" id="contact_id" class="form-control">
            <option value="">Please select...</option>
            @foreach($contacts as $contact)
                <option value="{{ $contact->id }}"
                    {{ $contact->id == old('contact_id', $order->contact_id) ? ' selected' : ''}}>
                    {{ $contact->first_name }} {{$contact->last_name}} ({{$contact->company->name}})
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
<order-item-form :order-items="{{$order->items}}"></order-item-form>


