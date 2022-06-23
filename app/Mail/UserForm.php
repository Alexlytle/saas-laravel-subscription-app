<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class UserForm extends Mailable
{
    use Queueable, SerializesModels;

    public $firstname;
    public $lastname;
    public $email;
    public $question;

    public function __construct($firstname,$lastname,$email,$question)
    {
        
        $this->firstname = $firstname;
        $this->lastname = $lastname;
        $this->email = $email;
        $this->question = $question;

    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.supprt.user')
                    ->from('webfielddesign@gmail.com', 'WebField Design')
                    ->subject('New Message from WebField');
    }
}
