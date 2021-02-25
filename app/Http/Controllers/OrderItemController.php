<?php

namespace App\Http\Controllers;

use App\OrderItem;
use App\Http\Requests\CreateOrderItem;
use App\Http\Requests\UpdateOrderItem;
use Illuminate\Http\Request;

class OrderItemController extends Controller
{
    public function index()
    {
        $order_items = OrderItem::paginate(15);

        return view('order-items.index', compact('order_items'));
    }

    public function create()
    {
        $order_item = new OrderItem;

        return view('order-items.create', compact('order_item'));
    }

    public function store(CreateOrderItem $request)
    {
        OrderItem::create($request->all());

        return redirect('order-items')->with('alert', 'Order Item created!');
    }

    public function edit(OrderItem $order_item)
    {
        return view('order-items.edit', compact('order_item'));
    }

    public function update(UpdateOrderItem $request, OrderItem $order_item)
    {
        $order_item->update($request->all());

        return redirect('order-items')->with('alert', 'Order Item updated!');
    }
}
