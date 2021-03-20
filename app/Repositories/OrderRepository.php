<?php
namespace App\Repositories;

use App\Interfaces\OrderRepositoryInterface;
use App\{Order, Contact, Company, OrderItem};


/**
 * summary
 */
class OrderRepository implements OrderRepositoryInterface
{
    /**
     * summary
     */
    public function __construct()
    {

    }

    public function all()
    {
    	return Order::with('items')->paginate(15);
    }

    public function getContacts()
    {
        return Contact::select('first_name', 'last_name', 'id')->get();
    }

    public function findById($order_id)
    {
        return Order::where('id', $order_id)->firstOrFail();
    }

    public function getOrderItems($order_id)
    {
        return OrderItem::where('order_id', $order_id)->get();
    }
}

 ?>