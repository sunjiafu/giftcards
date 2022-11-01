<?php
/** @var SergiX44\Nutgram\Nutgram $bot */

use App\Http\Controllers\Telegram\ProductController;

use App\Telegram\Conversations\Product as ConversationsProduct;


/*
|--------------------------------------------------------------------------
| Nutgram Handlers
|--------------------------------------------------------------------------
|
| Here is where you can register telegram handlers for Nutgram. These
| handlers are loaded by the NutgramServiceProvider. Enjoy!
|
*/

$bot->onCommand('start', [ProductController::class,'start'])->description('The start command!');
$bot->onText('🛒product', [ConversationsProduct::class,'start']);

