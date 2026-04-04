<?php

use App\Http\Controllers\imgController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::controller(imgController::class)->group(function(){
    
    //index
    Route::get('/products' , 'index')->name('products.index');

    // add / store
    Route::get('/products/create' , 'create')->name('products.create');
    Route::post('/products/store' , 'store')->name('products.store');

    //destroy 
    Route::delete('/product/{product}' , 'destroy')->name('products.destroy');

    //edit
    Route::get('/products/{product}/edit' , 'edit')->name('products.edit');
    Route::put('products/{product} ' , 'update')->name('products.update');
});
