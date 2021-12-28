<?php

use App\Http\Livewire\Article\Article;
use App\Http\Livewire\Index\Index;
use Illuminate\Support\Facades\Route;


Route::get('/' , Index::class);
Route::get('/article/{id}' , Article::class)->name('article');  //show page article
