<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Tests\TestCase;
use App\Jobs\TelegramSendmessage;
use SergiX44\Nutgram\Nutgram;

class CategorylistController extends TestCase
{

    public function Sendmessage()
    {
      

        $reviews =giftcard_config_get('content');
        
        // ...

dd($reviews);
    }

   

}
