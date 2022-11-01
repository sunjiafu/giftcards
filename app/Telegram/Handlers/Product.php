<?php

namespace App\Telegram\Handlers;

use SergiX44\Nutgram\Nutgram;
use Illuminate\Support\Facades\App;
use SergiX44\Nutgram\Conversations\InlineMenu;
use SergiX44\Nutgram\Telegram\Attributes\ParseMode;
use SergiX44\Nutgram\Telegram\Types\Keyboard\InlineKeyboardButton;




class Product extends InlineMenu
{
    public function Product(Nutgram $bot): void
    {
      
   
    $this->menuText('productlsit')->addButtonRow(

        InlineKeyboardButton::make('itunes',callback_data:'product@productlist'),
    )->showMenu();

 
    }
}
