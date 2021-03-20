<?php

namespace App\Listeners;

use App\Events\OrderCreated;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Mail\SendOrderCreationMail;
use Illuminate\Support\Facades\Mail;

class SendOrderCreatedEmail
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  OrderCreated  $event
     * @return void
     */
    public function handle(OrderCreated $event)
    {
        /**
         * Handle the order created event.
         *
         * @param  OrderCreated  $event
         * @return void
         */
        $data = [
            'order' => $event->order,
            'items' => $event->items,
            'contact' => $event->contact,
        ];

        Mail::send(
            new SendOrderCreationMail($data['order'], $data['items'], $data['contact'])
        );

    }
}
