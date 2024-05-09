<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return Inertia('home',[
        'username' => "JohnDoe",
        'usernamex' => "JohnDoex",
    ]);
});

Route::get('/users',function (){
   return Inertia('users',[
       'users' => \App\Models\User::all()->map(fn($user)=>[
           'name' => $user->name
       ])
   ]);
});

Route::get('/settings',function (){
    sleep(1);
    return Inertia('settings');
});

Route::post('/logout',function (){
    dd(request('foo'));
});
