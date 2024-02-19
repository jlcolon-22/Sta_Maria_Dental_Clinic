<?php

namespace App\Livewire\Pages;

use Livewire\Attributes\Lazy;
use Livewire\Component;
use Livewire\Attributes\Title;

// #[Lazy]
class Homepage extends Component
{
    public function placeholder()
    {
        return view("livewire.loading");
    }
    #[Title('Homepage')]
    public function render()
    {

        return view('livewire.pages.homepage');
    }
}
