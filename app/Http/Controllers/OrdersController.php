<?php

namespace App\Http\Controllers;

use App\Order;
use App\OrderItem;
use App\Company;
use App\Contact;
use App\Http\Requests\CreateOrder;
use Illuminate\Http\Request;

class OrdersController extends Controller
{
    private $pageType;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        if (\Request::segment(2) == 'create') {
            $this->pageType = 'create';
        } else {
            $this->pageType = 'edit';
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::all();
        
        return view('orders.index', compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pageType  = $this->pageType;
        $companies = Company::pluck('name', 'id')->all();
        $contacts  = Contact::get()->pluck('full_name', 'id')->toArray();

        return view('orders.form', compact('pageType', 'companies', 'contacts'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CreateOrder $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateOrder $request)
    {
        $order = Order::create($request->all());
        foreach($request->get('item') as $item) {
            $order->items()->create(['item' => $item]);
        }

        return redirect('orders')->with('alert', 'Order created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        return view('orders.show', compact('order'));
    }

}
