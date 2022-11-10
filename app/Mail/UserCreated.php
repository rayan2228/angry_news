<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class UserCreated extends Mailable
{
    use Queueable, SerializesModels;
    protected $user_name, $user_email, $user_role, $user_password;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user_name, $user_email, $user_role, $user_password)
    {
        $this->user_name = $user_name;
        $this->user_email = $user_email;
        $this->user_role = $user_role;
        $this->user_password = $user_password;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('backend.mail.user_create',[
            'user_name' => $this->user_name,
            'user_email' => $this->user_email,
            'user_role' => $this->user_role,
            'user_password' => $this->user_password,
        ]);
    }
}
