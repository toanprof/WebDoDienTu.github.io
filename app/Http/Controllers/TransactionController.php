<?php

namespace App\Http\Controllers;

use App\Jobs\sendBillJob;
use App\Models\Bill;
use App\Models\ChiTietDonHang;
use App\Models\Transaction;
use Carbon\Carbon;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class TransactionController extends Controller
{
    public function index()
    {
        $now = Carbon::now()->format('d/m/Y');
        // dd($now);
        $client = new Client([
            'headers' => [ 'Content-Type' => 'application/json' ]
        ]);

        $response = $client->post('http://103.137.185.207:9899/api/vcb/transactions',
                    [
                        'body' => json_encode(
                            [
                                'begin'           => $now,
                                'end'             => $now,
                                'username'        => '0799310141',
                                'password'        => 'Luchuynhtan30122002@',
                            ]
                    )]
                );

        $result = json_decode($response->getBody()->getContents(), true);

        if($result["success"] == true) {
            foreach($result["transactions"] as $value) {
                // dd($value);
                $tran = Transaction::where('reference', $value["Reference"])->first();
                if($value["CD"] == '+' && !$tran) {
                    $content = '';
                    if(strpos($value['Description'], "HDQL")) {
                        $content = Str::substr($value['Description'], strpos($value['Description'], "HDQL"));
                    }
                    Transaction::create([
                        'reference'     =>  $value['Reference'],
                        'amount'        =>  $value['Amount'],
                        'description'   =>  $value['Description'],
                        'content'       =>  $content,
                    ]);

                    $bill = Bill::where('bill_name', $content)->first();
                    if($value['Amount'] >= $bill->bill_total) {
                        $bill->is_payment = 1;
                        $bill->save();

                        $billDetail = ChiTietDonHang::where('id_don_hang', $bill->id)->get();
                        // send mail $email, $fullName, $chiTietDonHang
                        sendBillJob::dispatch($bill->customer_email, $bill->customer_fullname, $billDetail);
                    }
                }
            }
        }
    }

}
