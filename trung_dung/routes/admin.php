<?php
use Illuminate\Support\Facades\Route;

Route::get('dashboard', function(){
    return "Trang quản trị";
});

Route::get('/' , function(){
    return view ('backend.index');
});

Route::get('dashboard', 'ProductController@dashboard')->name('dashboard');

?>