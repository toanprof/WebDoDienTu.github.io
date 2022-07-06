<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class sendMailBill extends Mailable
{
    use Queueable, SerializesModels;

    public $full_name;
    public $billDetail;

    public function __construct($full_name, $billDetail)
    {
       $this->full_name  = $full_name;
       $this->billDetail = $billDetail;
    }

    public function build()
    {
        return $this->subject('Thông báo đơn hàng thanh toán thành công')->view('mail.send_bill', [
            'full_name'       =>  $this->full_name,
            'billDetail'      =>  $this->billDetail,
        ]);
    }
}
