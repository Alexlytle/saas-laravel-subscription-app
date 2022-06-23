<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class OneTimePaymentConfirmation extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $name;

    public $cost;

    public function __construct($name,$cost)
    {
        $this->name = $name;
        $this->cost = $cost;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        
        return $this->markdown('emails.one_time_payment_confirmation')
        ->from('webfielddesign@gmail.com', 'WebField Design')
        ->subject('Congratulations ' .  $this->name .' charge has been completed');
    }
}
