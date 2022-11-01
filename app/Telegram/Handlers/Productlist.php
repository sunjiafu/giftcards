<?php

namespace App\Telegram\Handlers;


use Illuminate\Support\Facades\App;
use SergiX44\Nutgram\Conversations\InlineMenu;

use SergiX44\Nutgram\Telegram\Attributes\ParseMode;
use SergiX44\Nutgram\Telegram\Types\Keyboard\InlineKeyboardButton;

use SergiX44\Nutgram\Nutgram;


class Productlist extends InlineMenu
{
    public function product(Nutgram $bot): void
    {

  $bot->run();
      $this->menuText('choose product')->addButtonRow(

        InlineKeyboardButton::make('iTunes'),
      )->showMenu();
    }
}
