<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ServicePlace extends Mailable
{
    use Queueable, SerializesModels;
    public $cart_collection;
    public $customer;
    public $room_no;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($cart_collection, $customer, $room_no)
    {
        $this->cart_collection = $cart_collection;
        $this->customer = $customer;
        $this->room_no = $room_no;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Mail Form Customer Service Request')->view('mail.place_request');
    }
}
