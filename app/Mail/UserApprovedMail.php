<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class UserApprovedMail extends Mailable
{
    use Queueable, SerializesModels;

    public $user;

    public function __construct($user)
    {
        $this->user = $user;
    }

    public function build()
    {
        return $this->view('emails.user_approved')
                    ->subject('Your Account Has Been Approved')
                    ->attach(public_path('images/abm-logo.svg')) // Attach the image
                    ->with([
                        'username' => $this->user->username,
                        'logo' => asset('images/abm-logo.svg') // Pass the logo URL
                    ]);
    }
    
}


