<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Route;

Route::get('login',[\App\Http\Controllers\Auth\LoginController::class,'create'])->name('login');
Route::post('login',[\App\Http\Controllers\Auth\LoginController::class,'store']);
Route::post('logout',[\App\Http\Controllers\Auth\LoginController::class,'destroy'])->middleware('auth');

Route::middleware('auth')->group(function (){



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
                   'name' => $user->name,
                   'can' => [
                       'edit' => Auth::user()->can('edit',\App\Models\User::class)
                   ]
               ]),
           'filters' => Request::only(['search']),
           'can' => [
               'createUser' => Auth::user()->can('create',\App\Models\User::class)
           ]
       ]);
    });

    Route::get('/users/create',function (){
        return Inertia('Users/Create');
    })->can('create','\App\Models\User');

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


});

