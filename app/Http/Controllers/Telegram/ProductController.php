<?php

namespace App\Http\Controllers\Telegram;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use SergiX44\Nutgram\Conversations\Conversation;
use SergiX44\Nutgram\Conversations\InlineMenu;
use SergiX44\Nutgram\Nutgram;
use SergiX44\Nutgram\Telegram\Attributes\ParseMode;
use SergiX44\Nutgram\Telegram\Types\Keyboard\InlineKeyboardButton;
use SergiX44\Nutgram\Telegram\Types\Keyboard\KeyboardButton;
use SergiX44\Nutgram\Telegram\Types\Keyboard\ReplyKeyboardMarkup;

class ProductController extends InlineMenu
{
 

  

    public function start(Nutgram $bot)
    {
        $bot->sendMessage('Welcome to Giftcards_Discount selling electronic gift cards (E-Gift cards) at a price of 50% of the face value, this is the perfect gift for any occasion.Thanks to the Electronic Gift Certificate, you can choose and buy yourself any product. Your dreams come true instantly.',['reply_markup'=>ReplyKeyboardMarkup::make('resize_keyboard = true')->addRow(

            KeyboardButton::make('🛒Product'),
            KeyboardButton::make('Reviews')
         )]);
    }
    
    

}
