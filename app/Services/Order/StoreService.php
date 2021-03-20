<?php

namespace App\Services\Order;

use App\{Order, OrderItem, Contact};
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendOrderCreationMail;

class StoreService
{
    protected $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function run()
    {
        DB::transaction(function () use(&$order){
            //Store Order details
            $order = new Order();
            $order->unique_number = $this->data['unique_number'];
            $order->contact_id = $this->data['contact_id'];
            $order->save();
            //Stores Items tied to this order
            $saved_order_items = [];
            if (isset($this->data['product_name']) && is_array($this->data['product_name'])) {
                foreach ($this->data['product_name'] as $key => $value) {
                    $item = new OrderItem();
                    $item->product_name = $value;
                    $item->price = $this->data['price'][$key];
                    $item->order_id = $order->id;
                    $item->save();
                    $saved_order_items[] = $item;
                }
            }
            $contact = Contact::findOrFail($order->contact_id);
            //send mail to user when an order is successfully created
            Mail::send(new SendOrderCreationMail($order, $saved_order_items, $contact));
        });

        return $order;
    }
}
