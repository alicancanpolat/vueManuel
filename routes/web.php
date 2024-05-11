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
   return Inertia('Users/Index',[
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


Route::get('/users/create',function (){
   return Inertia('Users/Create');
});
Route::post('/users',function(){
    $data = Request::validate([
       'name' => 'required',
       'password' => 'required',
       'email' => ['required', 'email'],
    ]);
    \App\Models\User::create($data);
    return redirect('/users');
});

Route::get('/settings',function (){
    return Inertia('settings');
});

Route::post('/logout',function (){
    dd(request('foo'));
});
