<?php

namespace App\Jobs;

use App\Mail\CustomerActiveMail;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailable;
use Illuminate\Support\Facades\Mail;

class sendMailActiveJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $full_name;
    private $link;
    private $mail_to;

    public function __construct($mail_to, $full_name, $link)
    {
        $this->full_name = $full_name;
        $this->link      = $link;
        $this->mail_to   = $mail_to;
    }

    public function handle()
    {
        Mail::to($this->mail_to)->send(new CustomerActiveMail($this->full_name, $this->link));
    }
}
