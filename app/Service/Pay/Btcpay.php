<?php

namespace App\Service\Pay;


use App\Models\Pay;
use Illuminate\Http\Request;
use BTCPayServer\Client\Invoice;
use BTCPayServer\Client\InvoiceCheckoutOptions;
use BTCPayServer\Util\PreciseNumber;

class Btcpay
{

   private $paygetway;
   public $apiKey;
   public $host;
   public $currency = 'USD';
   public $storeId;



   public function __construct()

   {

      $this->paygetway = Pay::find(3);

      $this->apiKey = $this->paygetway->apikey;

      $this->host = $this->paygetway->merchant_key;

      $this->storeId = $this->paygetway->store_id;
   }

   public  function CreateInvoice(?PreciseNumber $amount = null, ?string $orderId, string $buyerEmail = null)
   {

      //加载网关



      //构造订单信息

      $client = new Invoice($this->host, $this->apiKey);

      $metaData = [

         'itemDesc' => 'Buy gift cards',

     ];
     $redirecURL = url('orderdeail',$orderId);

      $checkoutOptions = new InvoiceCheckoutOptions();

      $checkoutOptions
         ->setRedirectURL($redirecURL);

      $data =  $client->createInvoice(
         $this->storeId,
         $this->currency,
         PreciseNumber::parseString($amount),
         $orderId,
         $buyerEmail,
         $metaData,
         $checkoutOptions
      );




      return  $data;
   }

   public function GetInvoice($invoiceId)
   {

      $client = new  Invoice($this->host, $this->apiKey);

      $getinvoice = $client->getInvoice($this->storeId, $invoiceId);

      return $getinvoice;
   }
}
