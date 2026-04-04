<?php

use App\Http\Controllers\EmployeController;
use Illuminate\Support\Facades\Route;



Route::controller(EmployeController::class)->group( function() {

    //index
    Route::get('/employes' , 'index')->name('employes.index');
    Route::get('/' , 'index2')->name('employe.carte');

    //destroy
    Route::delete('/employes/{employe}' , 'destroy')->name('employe.destroy');

    // add
    Route::get('/employes/create' , 'create')->name('employe.create');
    Route::post('/employes/store' , 'store')->name('employe.store');

    // edit
    Route::get('/employes/{id}/edit' , 'edit')->name('employe.edit');
    Route::put('/employes/{id}' , 'update')->name('employe.update');

    //show
    Route::get('/employes/{employe}' , 'show')->name('employe.show');

});