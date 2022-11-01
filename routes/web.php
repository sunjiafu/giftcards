<?php

use App\Http\Controllers\CategorylistController;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Bill;
use App\Http\Livewire\Home;
use App\Http\Livewire\ProductShow;
use App\Http\Livewire\Orderdeail;
use App\Http\Livewire\OrderSearchByemail;
use App\Http\Livewire\Product;
use App\Http\Livewire\Reviews;
use App\Http\Controllers\pay\UsdtController;
use App\Http\Controllers\Telegram\SetwebhookController;
use App\Http\Controllers\Telegram\FrontController;
use App\Http\Controllers\Telegram\ProductController;
use App\Http\Controllers\Telegram\WebhookController;
use App\Http\Livewire\Support;
use App\Telegram\Handlers\MyWebhookHandler;
use Illuminate\Http\Request;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/




Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::get('/', Home::class)->name('home');
Route::get('orderdeail/{order_sn}', Orderdeail::class);

Route::get('logs', [\Rap2hpoutre\LaravelLogViewer\LogViewerController::class, 'index']);


Route::get('product/{url}', ProductShow::class)->name('show');
Route::get('bill/{order_sn}', Bill::class)->name('bill');
Route::get('ordersearch', OrderSearchByemail::class)->name('ordersearch');
Route::get('product', Product::class)->name('product');
Route::get('support', Support::class)->name('support');
Route::get('reviews', Reviews::class)->name('reviews');
Route::post('btcpay/notifyurl', 'App\Http\Controllers\pay\BitcoinContorller@notifyUrl');
Route::post('usdtpay/notifyurl', [UsdtController::class, 'notifyUrl']);
Route::get('usdtpay/return_url',  [UsdtController::class, 'returnUrl'])->name('usdt-return');
Route::post('telegram/webhook', [WebhookController::class, 'webhook']);
Route::get('callback', [CategorylistController::class, 'sendmessage']);
Route::get('getkey', [MyWebhookHandler::class, 'productcate']);
