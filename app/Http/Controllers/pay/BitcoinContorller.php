<?php

namespace App\Http\Controllers\pay;

use App\Http\Controllers\Controller;
use App\Models\Pay;
use Illuminate\Http\Request;
use App\Service\Pay\Btcpay;
use BTCPayServer\client\webhook;
use App\Service\OrderProcessService;

class BitcoinContorller extends Controller
{

    private Btcpay $btcpay;

    private OrderProcessService $ops;

 

    public function __construct()
    {

        $this->btcpay = app('App\Service\Pay\Btcpay');

        $this->ops = app('App\Service\OrderProcessService');
      
    }

    public function notifyUrl(Request $request)
    {


        $raw_post_data = file_get_contents('php://input');

        $log = fopen("bitcoin.log", 'ab');
        $date = date('m/d/Y h:i:s a');

        if (!$raw_post_data) {

            fwrite(
                $log,
                $date . "没有数据"
            );
            fclose($log);
            return 'fail';
        };

        $data = json_decode($raw_post_data, true);
        if (!$data) {

            fwrite(
                $log,
                $date . "没有数据"

            );
            fclose($log);

            return 'fail';
        }


        $invoiceId = $data['invoiceId'];

        try {

            $secret = "3HP7UvtZEdBDrLWZHqEV5V55a1GF";

            $invoice = $this->btcpay->GetInvoice($invoiceId);

            $amount = $invoice['amount']; //获取价格

            $status = $invoice['status']; // 获取状态

            $orderId = $invoice['metadata']['orderId']; //获取orderId 



        } catch (\Throwable $e) {
            fwrite($log, $date . "Error: " . $e->getMessage() . '\n');
            fclose($log);
            throw $e;
        }

        //验证签名
        $headers =  getallheaders();

        $sig = $headers['Btcpay-Sig'];

        if ($sig !== "sha256=" . hash_hmac('sha256', $raw_post_data, $secret)) {

            fwrite($log, $date . "Error签名错误");
            fclose($log);

            return 'fail';
        } else {



            //验证通过处理业务

            $this->ops->completedOrder($orderId);


            return 'success';
        }
    }
}
