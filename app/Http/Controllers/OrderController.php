<?php

namespace App\Http\Controllers;

use App\Order;
use App\Contact;
use App\Item;
use App\Mail\OrderCreated;
use App\Http\Requests\CreateOrder;
use App\Http\Requests\UpdateOrder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::paginate(15);

        return view('orders.index', compact('orders'));
    }

    public function create()
    {
        $order = new Order;
        $contacts = Contact::select('first_name', 'last_name', 'id')->get();
        $items = Item::select('product_name', 'price', 'id')->get();

        return view('orders.create', compact('order', 'contacts', 'items'));
    }

    public function store(CreateOrder $request)
    {
        $order = Order::create($request->all());
        $order->items()->sync($request->items);

        Mail::to('info@pretendcompany.com')->send(new OrderCreated($order));

        return redirect('orders')->with('alert', 'Order created!');
    }

    public function edit(Order $order)
    {
        $contacts = Contact::select('first_name', 'last_name', 'id')->get();
        $items = Item::select('product_name', 'price', 'id')->get();
        return view('orders.edit', compact('order','contacts','items'));
    }

    public function update(UpdateOrder $request, Order $order)
    {
        $order->update($request->all());
        $order->items()->sync($request->items);

        return redirect('orders')->with('alert', 'Order updated!');
    }
}
