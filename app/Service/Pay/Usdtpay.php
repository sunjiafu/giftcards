<?php

namespace App\Service\Pay;

use GuzzleHttp\Client;


class Usdtpay  
{

    public function CreateInvoice(float $amount, string $orderId)
    {

        //构造需要请求的参数
        $parameter = [

            "amount" => $amount,
            "order_id" => $orderId,
            'redirect_url' => url('orderdeail', $orderId),
            'notify_url' => url('usdtpay' . '/notify_url')


        ];
        $parameter['signature'] = $this->epusdtSign($parameter, 'giftcardsdeal');

        $client = new Client(['headers' => ['Content-Type' => 'application/json']]);

        $response = $client->post("https://usdt.giftcardssupplier.com/api/v1/order/create-transaction", ['body' => json_encode($parameter)]);
        $body = json_decode($response->getBody()->getContents(), true);

    
        return $body;
    }
    public function epusdtSign(array $parameter, string $signKey)
    {
        ksort($parameter);
        reset($parameter); //内部指针指向数组中的第一个元素
        $sign = '';
        $urls = '';
        foreach ($parameter as $key => $val) {
            if ($val == '') continue;
            if ($key != 'signature') {
                if ($sign != '') {
                    $sign .= "&";
                    $urls .= "&";
                }
                $sign .= "$key=$val"; //拼接为url参数形式
                $urls .= "$key=" . urlencode($val); //拼接为url参数形式
            }
        }
        $sign = md5($sign . $signKey); //密码追加进入开始MD5签名
        return $sign;
    }
}
