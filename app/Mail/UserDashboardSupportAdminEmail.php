<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class UserDashboardSupportAdminEmail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $content;
    public $email;
    public $name;

    public function __construct($content,$mail,$name)
    {
        $this->content = $content;
        $this->email = $mail;
        $this->name = $name;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.supprt.admin-user')
                    ->from('webfielddesign@gmail.com','WebField Design')
                    ->subject('You have a new support message ' . $this->name .'' );
    }
}
