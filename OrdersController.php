<?php

namespace App\Http\Controllers;

use App\Orders;
use App\Company;
use App\Contact;
use App\Http\Requests\CreateOrder;
use App\Http\Requests\UpdateOrder;
use Illuminate\Http\Request;

class OrdersController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Orders::all();
        $orderten = Orders::latest()->take(10)->get();
        return view('orders.index', compact(['orders', 'orderten']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $orders = new Orders;
        $contact = Contact::pluck('first_name', 'id');
        $companies = Company::pluck('name', 'id');
        return view('orders.create', compact(['orders', 'contact', 'companies']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateOrder $request)
    {
        Orders::create($request->all());
        return redirect('orders')->with('alert', 'Order created!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Orders $orders)
    {
        $contact = Contact::pluck('first_name', 'id');
        $companies = Company::pluck('name', 'id');
        return view('orders.edit', compact(['orders', 'contact', 'companies']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateOrder $request, Orders $orders)
    {
        $orders->update($request->all());
        return redirect('orders')->with('alert', 'Order updated!');
    }
}
