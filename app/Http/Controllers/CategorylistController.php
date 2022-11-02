<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Tests\TestCase;
use App\Jobs\TelegramSendmessage;
use App\Models\Order;
use DefStudio\Telegraph\Models\TelegraphChat;
use SergiX44\Nutgram\Nutgram;

class CategorylistController extends TestCase
{

    public function Sendmessage()
    {
      

        $chat = TelegraphChat::find(1);

        $chat->forwardMessage(1001168050946,1215)->send();

        
        
        // ...

 

    }

   
  



}
