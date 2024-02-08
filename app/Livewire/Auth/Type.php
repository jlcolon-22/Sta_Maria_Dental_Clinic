<?php

namespace App\Livewire\Auth;

use Livewire\Attributes\Lazy;
use Livewire\Component;

#[Lazy]
class Type extends Component
{
    public function placeholder()
    {

        return view("livewire.loading");
    }
    public function render()
    {
        sleep(1);
        return view('livewire.auth.type');
    }
}
