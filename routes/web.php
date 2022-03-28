<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

$groupDataBoots = [
    'namespace' => 'App\Http\Controllers\Boots',
    //'prefix' => 'pair',
];
Route::group($groupDataBoots, function(){
    $methods = ['index','edit','store','update','create', 'show'];
    Route::resource('product','ProductController')->only($methods)->names('product');
});

$groupDataOrders = [
    'namespace' => 'App\Http\Controllers\Orders',
    //'prefix' => 'pair',
];
Route::group($groupDataOrders, function(){
    $methods = ['index','edit','store','update','create', 'show'];
    Route::resource('order','OrderController')->only($methods)->names('order');
});



//Получение json списка ботинков
    Route::post('/product/list', [App\Http\Controllers\Boots\ProductController::class, 'list'])->name('product.list');


