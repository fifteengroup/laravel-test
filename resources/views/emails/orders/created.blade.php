<div>
    Order:
</div>
<div>
    Product Name: {{ $order->product_name }}
</div>
<div>
    Price: {{ $order->price }}
</div>
<div>
    Quantity: {{ $order->quantity }}
</div>
<br/>
<div>
    Contact:
</div>
<div>
    First Name: {{ $order->contact->first_name }}
</div>
<div>
    Last Name: {{ $order->contact->last_name }}
</div>
<div>
    Role: {{ $order->contact->contactRole->name }}
</div>
<div>
    Contact Address:
</div>
@foreach($order->contact->contactAddresses as $key => $contactAddress)
    <div>
        {{ $key + 1 }}: {{ $contactAddress->address }}
    </div>
@endforeach
<br/>
<div>
    Contact Company:
</div>
<div>
    Name: {{ $order->contact->company->name }}
</div>
<div>
    Type: {{ $order->contact->company->companyType->name }}
</div>
<div>
    Status: {{ $order->contact->company->companyStatus->name }}
</div>
