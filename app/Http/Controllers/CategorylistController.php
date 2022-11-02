<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Tests\TestCase;
use App\Jobs\TelegramSendmessage;
use App\Models\Order;
use SergiX44\Nutgram\Nutgram;

class CategorylistController extends TestCase
{

    public function Sendmessage()
    {
      

        $reviews =Order::where('buyeremail','5410137820@giftcardssupplier.com')->get()->toArray();
        
        // ...

    if (!$reviews) {

        echo "meiyou";
        # code...
    }

    }

   

}
