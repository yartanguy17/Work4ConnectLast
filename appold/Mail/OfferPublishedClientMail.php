<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class OfferPublishedClientMail extends Mailable
{
    use Queueable, SerializesModels;

    public $user;
    public $offer;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user, $offer)
    {
        $this->user = $user;
        $this->user = $offer;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Publication')->view('mail.offer_published_client');
    }
}
