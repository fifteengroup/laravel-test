<?php

namespace App\Http\Controllers;

use App\Http\Requests\Order\StoreRequest;
use App\Services\Order\StoreService;
use App\Interfaces\{OrderRepositoryInterface};
use App\Order;

class OrderController extends Controller
{
    private $orderRepository;
    private $view_path;

    public function __construct(OrderRepositoryInterface $orderRepository)
    {
        $this->orderRepository = $orderRepository;
        $this->view_path = 'orders.';
    }

    public function index()
    {
        $orders = $this->orderRepository->all();
        return view($this->view_path."index", compact('orders'));
    }

    public function create()
    {
        $contacts = $this->orderRepository->getContacts();
        $orders = $this->orderRepository->all();
        $order = new Order;

        return view($this->view_path."create", compact('contacts', 'orders', 'order'));
    }

    public function store(StoreRequest $request)
    {
        (new StoreService($request->all()))->run();
        return redirect('orders')->with('alert', 'Order created!');
    }

    public function show($order_id)
    {
        $items = $this->orderRepository->getOrderItems($order_id);
        $order = $this->orderRepository->findById($order_id);
        return view($this->view_path."item.index", compact('items', 'order'));
    }

}
