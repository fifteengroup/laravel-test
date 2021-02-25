<?php

namespace App\Http\Controllers;

use App\Order;
use App\Contact;
use App\OrderItem;
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
        $order_items = OrderItem::select('product_name', 'price', 'id')->get();

        return view('orders.create', compact('order', 'contacts', 'order_items'));
    }

    public function store(CreateOrder $request)
    {
        $order = Order::create($request->all());
        $order->order_items()->sync($request->order_items);

        Mail::to('info@pretendcompany.com')->send(new OrderCreated($order));

        return redirect('orders')->with('alert', 'Order created!');
    }

    public function edit(Order $order)
    {
        $contacts = Contact::select('first_name', 'last_name', 'id')->get();
        $order_items = OrderItem::select('product_name', 'price', 'id')->get();
        return view('orders.edit', compact('order','contacts','order_items'));
    }

    public function update(UpdateOrder $request, Order $order)
    {
        $order->update($request->all());
        $order->order_items()->sync($request->order_items);

        return redirect('orders')->with('alert', 'Order updated!');
    }
}
