<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PlanConfirmationEmail extends Mailable
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
        return $this->markdown('emails.plan_confirmation_email')
                    ->from('webfielddesign@gmail.com', 'WebField Design')
                    ->subject('Thank you for your subscription payment');
    }
}
