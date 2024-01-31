<?php

namespace App\Livewire\Doctor;

use Livewire\Attributes\Lazy;
use Livewire\Component;

#[Lazy]
class Dashboard extends Component
{
    public function placeholder()
    {
        return view("livewire.loading");
    }

    public function render()
    {
        return view('livewire.doctor.dashboard');
    }
}
