<?php

namespace App\Http\Livewire\Index;

use App\Models\Article;
use Illuminate\Http\Request;
use Livewire\Component;

class Index extends Component
{

    public $newArticles;
    public $bestArticles;

    public function mount()
    {
        $this->newArticles = Article::query()->orderBy('id' , 'DESC')->take(4)->skip(0)->get();
        $this->bestArticles = Article::query()->where('is_best' , 1)->take(4)->skip(0)->get();
    }

    /*public function store(Request $request) {
        auth()->logout();
        return redirect()->route('login');
    }*/

    public function render()
    {
        return view('livewire.index.index');
    }
}
