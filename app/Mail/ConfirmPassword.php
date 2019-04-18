<?php

namespace App\Mail;
use App\Http\Controllers\HomeController;
use App\User;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ConfirmPassword extends Mailable
{
    use Queueable, SerializesModels;
    protected $user;
    protected $password;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user, $password)
    {
        $this->user = $user;
        $this->password = $password;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mail\mail_confirmation')->with(['user' => $this->user, 'password' => $this->password]);
    }
}
