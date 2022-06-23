<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NewPlanEmail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $plan_name;

    public $plan_price;

    public function __construct($plan_name,$plan_price)
    {
        $this->plan_name=$plan_name;
        $this->plan_price=$plan_price;

    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.new_plan_email')
            ->from('webfielddesign@gmail.com','WebfieldDesign')
            ->subject('Congratulations, '.$this->plan_name.' has been added to your account ');
    }
}
