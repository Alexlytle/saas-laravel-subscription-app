<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NewSingleChargePlan extends Mailable
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
        $this->cost = $cost;
        $this->name = $name;
        
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.new_single_charge_email')
        ->from('webfielddesign@gmail.com', 'WebField Design')
        ->subject('Congratulations ' .  $this->name .' charge has been added to your account');
    }
}
