<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateOrderItem;
use App\Order;
use App\OrderItem;
use Illuminate\Http\Request;

class OrderItemsController extends Controller
{

    public function create(Order $order)
    {
        $orderItem = new OrderItem;

        return view('order_items.create', compact('orderItem', 'order'));
    }

    public function store(CreateOrderItem $request)
    {
        OrderItem::create($request->all());
        $orderId = $request->get('order_id');
        $order = Order::find($orderId);

        Order::where('id', $orderId)
            ->update([
                'status' => 'Ready to process',
                'item_count' => $order->item_count + 1,
                'total' => $order->total + $request->get('amount'),
            ]);

        //return redirect('orders.')->with('alert', 'Order Item added!');
        return redirect()->route('orders.show', [$order]);
    }
}
