<?php

namespace App\Http\Controllers\pay;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Service\Pay\Usdtpay;
use App\Service\OrderProcessService;

class UsdtController extends Controller
{

    private  Usdtpay $usdtpay;
    private  OrderProcessService $ops;

    public function __construct()
    {

        $this->usdtpay = app('App\Service\Pay\Usdtpay');
        $this->ops = app('App\Service\OrderProcessService');
     
    }
    public function notifyUrl(Request $request)
    {
        $data = $request->all();
        
        if (!$data) {
            return 'fail';
        }
    
        $signature = $this->usdtpay->epusdtSign($data, 'giftcardsdeal');
        if ($data['signature'] != $signature) { //不合法的数据
            return 'fail';  //返回失败 继续补单
        } else {
            //合法的数据
            //业务处理

        

            $this->ops->completedOrder($data['order_id']);
          
            return 'ok';
        }
    }

    public function returnUrl(Request $request)
    {

        $oid = $request->get('order_id');

        // 异步通知还没到就跳转了，所以这里休眠2秒
        sleep(2);
        return redirect(url('orderdeail',$oid));
    }
}
