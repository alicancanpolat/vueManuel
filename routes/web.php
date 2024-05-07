<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return Inertia('welcome',[
        'name' => 'Ali'
    ]);
});
