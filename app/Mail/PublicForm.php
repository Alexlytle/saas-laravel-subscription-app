<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PublicForm extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
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
        return $this->markdown('emails.supprt.public')
                    ->from('webfielddesign@gmail.com', 'WebField Design')
                    ->subject('New Message from ' .  $this->firstname .'');
    }
}
