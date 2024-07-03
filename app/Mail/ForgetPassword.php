<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ForgetPassword extends Mailable
{
    use Queueable, SerializesModels;

    public $replyMessage;

    public function __construct($replyMessage)
    {
        $this->replyMessage = $replyMessage;
    }

    public function build()
    {
        return $this->view('emails.reset_password')
            ->with(['replyMessage' => $this->replyMessage])
            ->subject('Your Consultation Reply');
    }
}
