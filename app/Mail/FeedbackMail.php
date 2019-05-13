<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class FeedbackMail extends Mailable
{
    use Queueable, SerializesModels;

    public $user;
    public $subject;
    public $body;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user, $subject, $body)
    {
        $this->user = $user;
        $this->subject = $subject;
        $this->body = $body;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
            ->view('emails.feedback')
            ->subject($this->subject)
            ->with(['user' => $this->user, 'body' => $this->body]);
    }
}
