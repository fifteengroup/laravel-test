<div>
    An order has been created by {{ $order->contact->first_name }} {{ $order->contact->last_name }} at {{ $order->contact->company->name }}. <br>
    Order reference: {{ $order->reference }} <br>
    Total value: £{{ $order->total_value }}
</div>