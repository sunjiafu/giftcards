<?php

use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Route;
use Dcat\Admin\Admin;

Admin::routes();

Route::group([
    'prefix'     => config('admin.route.prefix'),
    'namespace'  => config('admin.route.namespace'),
    'middleware' => config('admin.route.middleware'),
], function (Router $router) {

    $router->get('/', 'HomeController@index');
    $router->resource('product', 'ProductController');
    $router->resource('category', 'CategoryController');
    $router->resource('amount', 'AmountController');
    $router->resource('pay', 'PayController');
    $router->resource('carmi', 'CarmiController');
    $router->resource('order', 'OrderController');
    $router->resource('reviews', 'ReviewController');

    $router->get('import-carmis', 'CarmiController@importCarmis');
    $router->get('system-set', 'SystemSettingController@systemSetting');
    $router->get('tgsendreviews','SystemSettingController@tgSendreviews');
    $router->get('tgsent-forward','TelegramForwardmessageController@telegramForwardmessage');
});
