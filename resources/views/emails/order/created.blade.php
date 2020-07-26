@component('mail::message')
# Order Created
<br>
An order has been created.
<br>
<strong>Order No#{{ $order->id }} </strong>
<br>
Ordered by      : {{ $order->contact->first_name }} {{ $order->contact->last_name }} <br>
Company         : {{ $order->contact->company->name }} <br>
Item Count      : {{ $order->item_count }} <br>
Order Total (£) : {{ $order->total }} <br>

# Order Item Details
<br>
<table>
    <thead>
    <tr>
        <th>Item Id#</th>
        <th>Product Name</th>
        <th>Purchase Quantity</th>
        <th>Purchase Price</th>
    </tr>
    </thead>
    <tbody>
    @foreach($order->items as $item)
        <tr>
            <td>{{ $item->id }}</td>
            <td>{{ $item->name }}</td>
            <td>{{ $item->quantity }}</td>
            <td>{{ $item->amount }}</td>
        </tr>
    @endforeach
    </tbody>
</table>
<br>

Thanks,<br>
Navneet Vats<br>
{{ config('app.name') }}
@endcomponent
