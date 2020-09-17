<?php

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

Route::get('/', 'PagesController@index');
Route::get('/contactus', 'PagesController@contactus');
Route::get('/menu', 'PagesController@menu');


Route::get('/additem', 'PagesController@addItem')->middleware('CheckAdmin');

Auth::routes();

Route::post('/additem', 'itemsController@add')->middleware('CheckAdmin');

Route::get('/menu/{id}/edit', "itemsController@edit")->middleware('CheckAdmin');
Route::put('/menu/{id}', "itemsController@update")->name('menu.update')->middleware('CheckAdmin');
Route::delete('/menu/{id}', "itemsController@delete")->name('menu.delete')->middleware('CheckAdmin');


Route::get('/addCart{id}', 'CartController@addCart')->middleware('auth');

Route::get('/mycart', 'CartController@myCart')->middleware('auth');


Route::get('/addOrder', 'OrderController@create')->middleware('auth');


Route::get('/orders', 'OrderController@orders')->middleware('CheckAdmin');
Route::get('/orderdetails', 'OrderController@orderDetails')->middleware('CheckAdmin');
Route::get('/users', 'PagesController@users')->middleware('CheckAdmin');


Route::post('/addmsg', 'MsgController@add');

Route::get('/messages', 'MsgController@show')->middleware('CheckAdmin');


Route::get('/customerorder', 'OrderController@customerorders')->middleware('auth');




Route::delete('/customerorder/{id}', "OrderController@delete")->name('customerorder.delete')->middleware('auth');


Route::delete('/mycart/{id}', "CartController@delete")->name('cart.delete')->middleware('auth');



Route::get('/addtopselling', 'TopsellingController@addItem')->middleware('CheckAdmin');


Route::post('/addtopselling', 'TopsellingController@add')->middleware('CheckAdmin');


Route::delete('/topselling/{id}', "TopsellingController@delete")->name('topselling.delete')->middleware('CheckAdmin');


Route::get('/addtopselling{id}', 'TopsellingController@addCart')->middleware('auth');


Route::get('/myprofile/{id}', 'ProfileController@myprofile')->middleware('auth');


Route::get('/editprofile/{id}/edit', "ProfileController@edit")->middleware('auth');



Route::put('/editprofile/{id}', "ProfileController@update")->name('profile.update')->middleware('auth');


Route::post('/makeadmin5152/', "ProfileController@makeadmin")->middleware('CheckAdmin');



Route::get('/menu/pizza/', "PagesController@filterPizza");
Route::get('/menu/burger/', "PagesController@filterBurger");



Route::post('/customerorder/{id}/archive', "OrderController@archive")->name('customerorder.archive')->middleware('CheckAdmin');

Route::get('/jsontest', "PagesController@jsonTest");


// Ajax training


Route::get('all-clients','ClientController@index');
Route::post('store','ClientController@store');