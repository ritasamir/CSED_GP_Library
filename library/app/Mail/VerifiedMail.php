<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\User;

class VerifiedMail extends Mailable
{
    use Queueable, SerializesModels;

    public $user;
    public $confirmation_code;
    public $url;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(User $user, $confirmation_code, $url)
    {
        $this->user = $user;
        $this->confirmation_code = $confirmation_code;
        $this->url = $url;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.verified');
    }
}
