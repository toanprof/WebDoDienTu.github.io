<?php

namespace App\Jobs;

use App\Mail\ResetPassMail;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class sendMailResetJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $hash;
    private $name;
    private $email;

    public function __construct($hash, $email, $name)
    {
        $this->name     = $name;
        $this->email    = $email;
        $this->hash     = $hash;
    }

    public function handle()
    {
        Mail::to($this->email)->send(new ResetPassMail($this->hash, $this->name));
    }
}
