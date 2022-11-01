<?php

namespace App\Http\Controllers\Telegram;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use SergiX44\Nutgram\Nutgram;

class WebhookController extends Controller
{
    //

    public function webhook(Nutgram $bot)
    {
        $bot->run();
    }
}
