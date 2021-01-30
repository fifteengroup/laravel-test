<?php

namespace App\Http\Controllers;

use App\Company;
use App\Contact;
use App\Events\OrderCreated as OrderCreatedEvent;
use App\Http\Requests\CreateOrder;
use App\Http\Requests\UpdateOrder;
use App\Mail\OrderCreated;
use App\Order;
use App\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class OrdersController extends Controller
{
    public function index(Request $request)
    {
        $sort = $request->query('sort') ?? 'id';
        //Cast user input to controllable values for use in query
        $order = $request->query('order') === 'desc' ? 'desc' :'asc' ;

        $sortOptions = [
            'sort' => [
                'Order Number' => 'id',
                'Total Cost' => 'total_cost',
                'Item Count ' => 'item_count'
            ],
            'order' => [
                'Ascending' => 'asc',
                'Descending' => 'desc'
            ]
        ];

        if ($sort === 'item_count') {
            $orders = Order::query()->leftJoin('order_items', 'orders.id', '=', 'order_items.order_id')->select('orders.*')
                ->groupBy('orders.id')
                ->orderByRaw('sum(order_items.price)'. $order);
        } elseif ($sort === 'total_cost') {
            $orders = Order::query()->leftJoin('order_items', 'orders.id', '=', 'order_items.order_id')->select('orders.*')
                ->groupBy('orders.id')
                ->orderByRaw('sum(order_items.price)'. $order);
        } else {
            $orders = Order::orderBy($sort, $order);
        }

        $orders = $orders->paginate(50);
        return view('orders.index', compact('orders', 'sortOptions', 'sort', 'order'));
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
        //Dispatch events to send mail and reminder notification
        Mail::to($exampleAddress)->queue(new OrderCreated($order));
        OrderCreatedEvent::dispatch($order);

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
