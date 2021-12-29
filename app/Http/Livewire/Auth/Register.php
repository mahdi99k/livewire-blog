<?php

namespace App\Http\Livewire\Auth;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class Register extends Component
{
    public $data = [
        "email" => "",
        "password" => "",
        "password_confirmation" => "",
        "policy" => false,  //rules
    ];

//   protected $rules= [];


    public function handleRegister()
    {
        $this->validate([
            'data.email' => 'required|email|max:100|unique:users,email',
            'data.password' => 'required|string|min:6|max:50|confirmed',  //confirmed بیا چک کن هر دوتا پسوورد یکی باشه | (password_confirmation) باید نام اینپوت حتما
            'data.policy' => 'required',
        ]);

        $user = new User();
        $user->email = $this->data['email'];
        $user->password = Hash::make($this->data['password']);
        $user->gender = 1;
        $user->is_admin = 0;
        $user->role = 'user';
        $user->news = 1;
        $user->save();

        $id = $user->id;
        \Auth::loginUsingId($id);  //میاد از طریق آیدی کاربر لاگین میکنه
        return redirect()->to('/')->with('login' ,'کاربر گرامی به وب سایت خوش آمدید'); //url
//      return redirect(route('index'));
//      return redirect()->route('index');
    }


    public function render()
    {
        return view('livewire.auth.register');
    }

}
