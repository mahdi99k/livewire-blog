<?php

use App\Http\Livewire\Article\Article;
use App\Http\Livewire\Auth\Login;
use App\Http\Livewire\Auth\Register;
use App\Http\Livewire\Index\Index;
use Illuminate\Support\Facades\Route;


Route::get('/register' , Register::class)->name('register')->middleware('guest');  //حتما باید کاربر ساده باش تا بتونه لاگین ببینه
Route::get('/login' , Login::class)->name('login')->middleware('guest');  //حتما باید کاربر ساده باش تا بتونه لاگین ببینه
Route::get('/logout' , function () {
   Auth::logout();
   return redirect()->route('index');
});
//Route::post("/logout",[Index::class,"store"])->name("logout");

Route::get('/' , Index::class)->name('index');
Route::get('/article/{id}' , Article::class)->name('article');  //show page article
