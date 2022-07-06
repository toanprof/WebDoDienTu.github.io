<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ResetPassMail extends Mailable
{
    use Queueable, SerializesModels;

    public $hash;
    public $name;

    public function __construct($hash, $name)
    {
        $this->hash = $hash;
        $this->name = $name;
    }

    public function build()
    {
        return $this->subject('Khôi phục tài khoản')->view('mail.customer_resetpass', [
            'hash'      =>  $this->hash,
            'name'      =>  $this->name,
        ]);
    }
}
