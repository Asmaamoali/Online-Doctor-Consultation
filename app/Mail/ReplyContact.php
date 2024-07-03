<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ReplyContact extends Mailable
{
    use Queueable, SerializesModels;

    public $replyMessage;

    public function __construct($replyMessage)
    {
        $this->replyMessage = $replyMessage;
    }

    public function build()
    {
        return $this->view('emails.reply_contact')
            ->with(['replyMessage' => $this->replyMessage])
            ->subject('Your Message Reply');
    }
}
