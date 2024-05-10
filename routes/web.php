<?php

use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return Inertia('home',[
        'username' => "JohnDoe",
        'usernamex' => "JohnDoex",
    ]);
});

Route::get('/users',function (){
   return Inertia('users',[
       'users' => \App\Models\User::query()
           ->when(Request::input('search'),function ($query,$search){
               $query->where('name','like',"%$search%");
           })
           ->paginate(10)
           ->withQueryString()
           ->through(fn($user) => [
               'id' => $user->id,
               'name' => $user->name
           ]),
       'filters' => Request::only(['search'])
   ]);
});

Route::get('/settings',function (){
    sleep(1);
    return Inertia('settings');
});

Route::post('/logout',function (){
    dd(request('foo'));
});
