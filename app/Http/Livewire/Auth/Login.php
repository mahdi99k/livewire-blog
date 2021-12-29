<?php

namespace App\Http\Livewire\Auth;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Login extends Component
{

    public $data = [
        "email" => "",
        "password" => "",
        "remember" => false,
    ];

    public function login()
    {
        $this->validate([
            'data.email' => 'required|email|max:100',
            'data.password' => 'required|string|min:6|max:50|regex:/^[a-zA-Z0-9@$#^%&*!]+$/u',  //فقط حروف کوچک و بزرگ انگلیسی و اعداد و اتساین و دالر و هشتک و.
//          'data.remember' => 'nullable'
        ]);

        //attempt شما ایمیل و پسوورد بده اگر درست بود به صورت خودکار عملیات ورود انجام میدم | two) اگر درست یا غلط بزنی من (ریممبر) فعال یا غیر فعال میکنم
        if (Auth::attempt(['email' => $this->data['email'], 'password' => $this->data['password']], $this->data['remember'])) {
            return redirect()->to('/');
//          return redirect(route('index'));
//          return redirect()->route('index');
        }

    }


    public function render()
    {
        return view('livewire.auth.login');
    }

}
