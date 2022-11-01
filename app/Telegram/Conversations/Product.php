<?php

namespace App\Telegram\Conversations;

use App\Models\Category;
use Dflydev\DotAccessData\Data;
use SergiX44\Nutgram\Conversations\Conversation;
use SergiX44\Nutgram\Conversations\InlineMenu;
use SergiX44\Nutgram\Nutgram;
use SergiX44\Nutgram\Telegram\Attributes\ParseMode;
use SergiX44\Nutgram\Telegram\Types\Inline\CallbackQuery;
use SergiX44\Nutgram\Telegram\Types\Keyboard\InlineKeyboardButton;

use function PHPUnit\Framework\callback;

class Product extends InlineMenu
{



    public function start(Nutgram $bot)
    {




        $this->bot = $bot;

        $this
            ->clearButtons();
        $this->menuText('test');
        
        foreach(Category::all() as $category){
         $buttons =    InlineKeyboardButton::make('iTunes', callback_data: 'itunes@iTunes');
            
        }

            $this->addButtonRow(

                
               $buttons
            );


    

        $this->showMenu();
    }

    public function iTunes(Nutgram $bot)
    {


        $this
            ->clearButtons()
            ->menuText("Choose Product ", [
                'parse_mode' => ParseMode::HTML,
            ]);

        $this->addButtonRow(
            InlineKeyboardButton::make('USA-itunes-50$', callback_data: 'USA-itunes-50$@Detail'),
            InlineKeyboardButton::make('USA-itunes-100$', callback_data: 'itunes@Detail'),
        );

        $this->addButtonRow(InlineKeyboardButton::make("🔙 Back", callback_data: 'back@start'));

        $this->showMenu();
    }

    public function Detail(Nutgram $bot)

    {

        //设置价格

        switch ($bot->callbackQuery()->data) {

            case 'USA-itunes-50$';
                $price = 40;
        }

        $this->productname = $bot->callbackQuery()->data;
        $this->price = $price;
        $this
            ->clearButtons()
            ->menuText(
                "
                    ⚙️ SettingsHere you can change the bot settings.
               
                    📰 Product: {$this->productname}
                    💬 Price:$.{$this->price}
                ",

                [
                    'parse_mode' => ParseMode::HTML,
                ]
            );

        $this->addButtonRow(

            InlineKeyboardButton::make('Bitcoin', 'https://t.me'),
            InlineKeyboardButton::make('Usdt-Trc20', 'https://t.me')
        );

        $this->addButtonRow(InlineKeyboardButton::make("🔙 Back", callback_data: 'back@start'));

        $this->showMenu();


     
    }
}
