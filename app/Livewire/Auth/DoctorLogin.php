<?php

namespace App\Livewire\Auth;

use Livewire\Component;
use Livewire\Attributes\Lazy;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\Auth;

#[Lazy]
class DoctorLogin extends Component
{
    #[Validate('required')]
    public $username = '';
    #[Validate('required')]
    public $password = '';
    public function doctorLogin()
    {
        $this->validate();
        if(Auth::guard('doctor')->attempt(['fullname'=> $this->username,'password'=> $this->password]))
        {
            if(Auth::guard('doctor')->user()->status)
            {
                return redirect('/doctor/dashboard');
            }else{
                session()->flash('info', 'true');
            }

        }else{
            session()->flash('error-credentials', 'true');
        }
    }
    public function placeholder()
    {
        return view("livewire.loading");
    }
    public function render()
    {
        return view('livewire.auth.doctor-login');
    }
}
