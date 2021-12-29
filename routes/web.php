<?php

use App\Http\Livewire\Article\Article;
use App\Http\Livewire\Auth\Login;
use App\Http\Livewire\Auth\Register;
use App\Http\Livewire\Index\Index;
use Illuminate\Support\Facades\Route;


Route::get('/' , Index::class)->name('index');
Route::get('/register' , Register::class)->name('register');
Route::get('/login' , Login::class)->name('login');
Route::get('/article/{id}' , Article::class)->name('article');  //show page article
