<?php

namespace App\Livewire\Auth;

use Livewire\Component;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;

class AdminLogin extends Component
{

    public $email;
    public $password = '';

    public function rules()
    {
        return [
            'email' => ['required'],
            'password' => ['required'],
        ];
    }

    public function adminLogin()
    {
        $this->validate();
        if(Auth::guard('web')->attempt(['branch_name'=> $this->email,'password'=> $this->password]))
        {
            return redirect('/admin/dashboard');
        }else{
            session()->flash('error-credentials', 'true');
        }
    }
    public function render()
    {
        sleep(1);
        return view('livewire.auth.admin-login');
    }
}
