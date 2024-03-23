<?php

namespace App\Livewire\Auth;

use Livewire\Component;
use Livewire\Attributes\Lazy;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\Auth;

// #[Lazy]
class PatientLogin extends Component
{
    #[Validate('required')]
    public $username = '';
    #[Validate('required')]
    public $password = '';
    public function placeholder()
    {
        return view("livewire.loading");
    }

    public function store()
    {
        $this->validate();
        if(Auth::guard('patient')->attempt(['username'=> $this->username,'password'=> $this->password]))
        {
            return redirect('/');
        }else{
            session()->flash('error-credentials', 'true');
        }
    }
    public function render()
    {

        return view('livewire.auth.patient-login');
    }
}
