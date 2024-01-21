<?php

namespace App\Livewire\Auth;

use Livewire\Attributes\Lazy;
use Livewire\Component;

#[Lazy]
class PatientLogin extends Component
{
    public function placeholder()
    {
        return view("livewire.loading");
    }
    public function render()
    {
        return view('livewire.auth.patient-login');
    }
}
