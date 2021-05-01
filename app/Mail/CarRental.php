<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class CarRental extends Mailable
{
    use Queueable, SerializesModels;
    public $details;
    public $customer;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($details, $customer)
    {
        $this->details = $details;
        $this->customer = $customer;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mail.car_rental');
    }
}
