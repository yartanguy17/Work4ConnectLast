<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ApplyAdminMail extends Mailable
{
    use Queueable, SerializesModels;

    public $user;
    public $offer;
    public $apply;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user, $offer, $apply)
    {
        $this->user = $user;
        $this->offer = $offer;
        $this->apply = $apply;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $arrayEmails = ['notifications@centralresource.net', 'noreply@centralresource.net'];
        return $this->from($arrayEmails)->subject('Candidature')->view('mail.apply_admin');
    }
}
