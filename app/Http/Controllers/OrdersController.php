<?php

namespace App\Http\Controllers;

use App\Contact;
use App\Order;
use App\Http\Requests\CreateOrder;
use App\Http\Requests\UpdateOrder;
use App\Mail\OrderCreated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class OrdersController extends Controller
{
    public function index()
    {
        $orders = Order::sortable()->paginate(50);

        return view('orders.index', compact('orders'));
    }

    public function list(Request $request)
    {
        $request->validate([
            'createdAtGreaterThan' => 'nullable|date_format:Y-m-d\TH:i:s.v\Z'
        ]);

        $builder = Order::select();

        if ($request->has('createdAtGreaterThan')) {
            $builder->createdAtGreaterThan($request->get('createdAtGreaterThan'));
        }

        return $builder->get();
    }

    public function create()
    {
        $order = new Order;
        $contacts = Contact::select('id', 'first_name', 'last_name')->get();

        return view('orders.create', compact('order', 'contacts'));
    }

    public function store(CreateOrder $request)
    {
        $order = Order::create($request->all());

        Mail::to('info@pretendcompany.com')->send(new OrderCreated($order));

        return redirect('orders')->with('alert', 'Contact created!');
    }

    public function edit(Order $order)
    {
        $contacts = Contact::select('id', 'first_name', 'last_name')->get();

        return view('orders.edit', compact('order', 'contacts'));
    }

    public function update(UpdateOrder $request, Order $order)
    {
        $order->update($request->all());

        return redirect('orders')->with('alert', 'Contact updated!');
    }
}
