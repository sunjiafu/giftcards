<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Tests\TestCase;
use App\Jobs\TelegramSendmessage;
use App\Models\Order;
use DefStudio\Telegraph\Models\TelegraphChat;
use Illuminate\Support\Facades\Http;
use SergiX44\Nutgram\Nutgram;

use function GuzzleHttp\Promise\all;

class CategorylistController extends TestCase
{



    public function forwardMessage()
    {



        foreach (TelegraphChat::all() as $chat) {
            $chat->forwardMessage(giftcard_telegram_get('chat_id'), giftcard_telegram_get('messageid'))->send();
        }



        return  'ok';
    }

    public function SentMessage()
    {

        $chat = TelegraphChat::find(1);
    }
}
