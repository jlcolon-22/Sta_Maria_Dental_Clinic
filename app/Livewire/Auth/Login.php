<?php

namespace App\Livewire\Auth;

use Livewire\Component;

class Login extends Component
{
    public function render()
    {
        sleep(1);
        return view('livewire.auth.login');
    }
}
