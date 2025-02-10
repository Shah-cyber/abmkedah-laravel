<?php

namespace App\Jobs;

use App\Mail\UserApprovedMail;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailables\MailMessage;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Support\Facades\Mail;

class SendUserApprovedEmail implements ShouldQueue
{
    use Dispatchable, Queueable, SerializesModels;

    protected $user;

    public function __construct($user)
    {
        $this->user = $user;
    }

    public function handle()
    {
        Mail::to($this->user->email)->send(new UserApprovedMail($this->user));
    }
}