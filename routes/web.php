<?php

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

//Products
Route::get('/products', 'ProductController@index')->name('products.index');;
Route::get('/products/{Nom}','ProductController@show')->name('products.show');

//Cart
Route::get('/panier','CartController@index')->name('cart.index');
Route::post('/panier/ajouter','CartController@store')->name('cart.store');
Route::delete('/panier/{rowId}','CartController@destroy')->name('cart.destroy');
Route::get('/viderpanier',function(){
    Cart::destroy();
    return redirect()->route('products.index');
});

//Checkout
Route::get('/checkout','CheckoutController@index')->name('checkout.index');
Route::post('/checkout','CheckoutController@store')->name('checkout.store');
Route::get('/merci',function(){
    return view('checkout.thankyou');
});

//Formules
Route::get('/formules', 'FormuleController@index')->name('formules.index');;
Route::get('/formules/{nomFormule}','FormuleController@show')->name('formules.show');


//auth
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
