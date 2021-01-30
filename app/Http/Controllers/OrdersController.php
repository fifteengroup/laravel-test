<?php

namespace App\Http\Controllers;

use App\Company;
use App\Contact;
use App\Http\Requests\CreateOrder;
use App\Http\Requests\UpdateOrder;
use App\Mail\OrderCreated;
use App\Order;
use App\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class OrdersController extends Controller
{
    public function index()
    {
        $orders = Order::paginate(50);
        return view('orders.index', compact('orders'));
    }

    public function create(Request $request)
    {
        $order = new Order;
        $contacts = Contact::all();
        return view('orders.create', compact('order', 'contacts'));
    }

    public function store(CreateOrder $request)
    {
        $requestPayload = $request->all();
        $orderItems = $requestPayload['item'] ?? [];
        unset($requestPayload['item']);
        $order = Order::create($requestPayload);
        foreach ($orderItems as &$item) {
            $item = new OrderItem($item);
            $item->order_id = $order->id;
        }
        $order->items()->delete();
        $order->items()->saveMany($orderItems);

        $exampleAddress = 'info@pretendcompany.com';
        Mail::to($exampleAddress)->queue(new OrderCreated($order));
        return redirect('orders')->with('alert', 'Order created!');
    }

    public function edit(Request $request, Order $order)
    {
        $contacts = Contact::all();
        return view('orders.edit', compact('order', 'contacts'));
    }

    public function update(UpdateOrder $request, Order $order)
    {
        $requestPayload = $request->all();
        $orderItems = $requestPayload['item'] ?? [];
        unset($requestPayload['item']);
        $order->update($requestPayload);
        foreach ($orderItems as &$item) {
            $item = new OrderItem($item);
            $item->order_id = $order->id;
        }

        //re-sync relationship based on incoming data;
        $order->items()->delete();
        $order->items()->saveMany($orderItems);

        $order->update($request->all());
        return redirect('orders')->with('alert', 'Order updated!');
    }
}
