<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendOrderCreationMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $order;
    public $items;
    public $contact;

    public function __construct($order, $items, $contact)
    {
        $this->order = $order;
        $this->items = $items;
        $this->contact = $contact;
    }
    public function build()
    {
        return $this->from(env('MAIL_FROM_ADDRESS', 'ajayi.nurudeen.wale@gmail.com'))
            ->to(env('ORDER_MAIL_TO_ADDRESS', 'info@pretendcompany.com'))
            ->subject("New Order Created")
            ->view('mail.order.new', [
                "order" =>$this->order,
                "items" => $this->items,
                "contact" => $this->contact,
            ]);
    }
}
