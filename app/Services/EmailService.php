<?php

namespace App\Services;

use Illuminate\Support\Facades\Mail;
use Illuminate\Mail\Mailable;

class EmailService
{
    public function sendToAdmin(Mailable $mail) :void
    {
        Mail::to(env('A_ADDRESS'))->send($mail);
    }
}
