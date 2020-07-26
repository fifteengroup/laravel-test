<?php

namespace App\Http\Controllers;

use App\Contact;
use App\Http\Requests\CreateOrder;
use App\Mail\OrderCreatedMail;
use App\Notifications\ProcessOrders;
use App\Order;
use App\User;
use Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Notification;

class OrdersController extends Controller
{
    public function index()
    {
        $orders = Order::with(['contact', 'contact.company'])->get();

        return view('orders.index', compact('orders'));
    }


    public function create()
    {
        $order = new Order;
        $contacts = Contact::all()->pluck('name', 'id');

        return view('orders.create', compact('order', 'contacts'));
    }


    public function store(CreateOrder $request)
    {
        Order::create($request->all());

        return redirect('orders')->with('alert', 'Order created!');
    }

    public function show(Order $order)
    {
        //Mark Process Order Notification as read
        if (Auth::user()->unreadNotifications->count()) {
            Auth::user()->unreadNotifications->markAsRead();
        }

        return view('orders.show', compact('order'));
    }

    public function updateStatusReadyToDespatch(Order $order)
    {
        Order::where('id', $order->id)
            ->update([
                'status' => 'Ready to despatch',
            ]);

        // Send email when order is ready for despatch
        Mail::to('info@pretendcompany.com')->send(new OrderCreatedMail($order));

        // Notification
        $when = Carbon::now()->addMinutes(30);
        $users = User::all();
        foreach ($users as $user) {
            $user->notify((new ProcessOrders($order))->delay($when));
        }

        return redirect()->route('orders.show', [$order]);
    }

    public function updateStatusComplete(Order $order)
    {
        Order::where('id', $order->id)
            ->update([
                'status' => 'Complete',
            ]);

        return redirect()->route('orders', [$order]);
    }
}
