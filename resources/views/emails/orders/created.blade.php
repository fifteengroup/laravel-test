<h1>Order Created</h1>
<p>Order #: {{$order->id}}</p>
<p>Company: {{$order->contact->company->name}}</p>
<p>Contact: {{$order->contact->first_name}} {{$order->contact->last_name}}</p>


<h2>Line Items</h2>
<table>
    <thead>
        <tr>
            <td>Item Name</td>
            <td>Price (£)</td>
        </tr>
    </thead>
    <tbody>
        @foreach($order->items as $item)
            <td>{{$item->product_name}}</td>
            <td>{{$item->price}}</td>
        @endforeach
    </tbody>
</table>
