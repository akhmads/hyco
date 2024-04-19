<?php

use Illuminate\Support\Facades\Route;

Route::middleware(['web'])->group(function () {

    Route::get('/hyco/counter', \Akhmads\Hyco\Livewire\Counter::class);
    Route::get('/hyco/hello', \Akhmads\Hyco\Livewire\Hello::class);

});
