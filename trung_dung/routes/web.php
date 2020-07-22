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
Route::get('/' , 'ProductController@index');
Route::get('categories','CategoryController@index')->name('cate.list');
Route::get('categories/{id}/remove','CategoryController@delete')->name('cate.remove');
Route::get('categories/add-cate', 'CategoryController@addcate')->name('cate.addcate');

Route::post('categories/add-cate', 'CategoryController@saveAdd')->name('saveadd');
Route::get('categories/edit/{id}', 'CategoryController@edit')->name('cate.edit');
Route::post('categories/edit/{id}', 'CategoryController@saveCate');





Route::get('product','ProductController@index')->name('pro.list');
// thêm sản phẩm
Route::get('product/add-product','ProductController@addPro')->name('pro.addpro');
Route::post('product/add-product', 'ProductController@savePro')->name('pro.saveadd');
//xóa sản phẩm
Route::get('product/{id}/remove','ProductController@delete')->name('pro.remove');
//sửa sản phẩm 
Route::get('product/edit', 'ProductController@editPro')->name('pro.edit');
Route::post('product/edit', 'ProductController@saveProduct');




Route::get('layout', function(){
    return view('layouts.main');
});



Auth::routes();
Route::get('/search','HomeController@search')->name('search');
Route::get('/home', 'HomeController@index')->name('home');

Route::get('products/delete-cart','HomeController@deleteCart')->name('cart.delete');
Route::get('products/add-to-cart/{id}','HomeController@addToCart')->name('addToCart'); 
Route::get('products/show-cart','HomeController@showCart')->name('cart.view');
Route::get('products/update-cart','HomeController@updateCart')->name('cart.update');

Route::get('remove', 'HomeController@remove')->name('cart.delete');
Route::get('delete', 'HomeController@delete')->name('cart.remove');

Route::get('product/add-wishlist/{id}','HomeController@addTocWishlist')->name('addTocWishlist');
Route::get('product/show-wishlist','HomeController@showWishlist')->name('wishlist.view');

Route::get('index','HomeController@home')->name('index');
Route::get('shop-grid','HomeController@shopgrid')->name('shop-grid');

Route::get('/blog-details','HomeController@blogdetails')->name('blogdetails');
Route::get('/blog','HomeController@blog')->name('blog');
Route::get('/checkout','HomeController@checkout')->name('checkout');
Route::get('/contact','HomeController@contact')->name('contact');
Route::get('/shop-details','HomeController@shopdetails')->name('shopdetails');
Route::get('/shoping-cart', 'HomeController@shopingcart')->name('shopingcart');
Route::get('wishlist', 'HomeController@wishlist')->name('wishlist');
Route::get('/logout', 'HomeController@logout')->name('logout');

Route::get('dashboard', 'ProductController@dashboard')->name('dashboard');
Route::get('/shop-detail','ProductController@showProduct')->name('pro.show');


