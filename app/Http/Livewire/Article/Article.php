<?php

namespace App\Http\Livewire\Article;

use \App\Models\Article as ModelsArticle;
use App\Models\Comment;
use Livewire\Component;

class Article extends Component
{

    public $article;
    public $comment_text = "";


    public function addComment()
    {

        $this->validate([
            'comment_text' => 'required|string|max:2000|regex:/^[ا-یa-zA-Z0-9 ? : - . , * !]+$/u'  //حروف فارسی و انگلیسی و اعداد و اشکال
        ]);

        $comment = new Comment();
        $comment->text = $this->comment_text;
        $comment->user_id = \Auth::user()->id;
        $comment->article_id = $this->article->id;
        $comment->is_active = 1;
        $comment->parent_id = 0;
        $comment->save();
        $this->comment_text = "";
//      $this->reset('comment_text');
    }


    public function mount($id)  //Route::get('/article/{id}' | این قسمت فقط بار اول که وارد صفحه میشیم قرار میده تغییرات دفعه بعدی باید رفرش کینم
    {
        $this->article = ModelsArticle::query()->findOrFail($id);
    }


    public function render()   //میاد بدون رفرش قرار میده تو صفحه
    {
        $comments = Comment::query()->where('article_id', $this->article->id)->get();  //خود کار بدون رفرش کامنت قرار میگیره
        return view('livewire.article.article', ['comments' => $comments]);
    }

}
