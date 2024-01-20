<?php

namespace App\Livewire\Pages;

use Livewire\Attributes\Lazy;
use Livewire\Component;

#[Lazy]
class Location extends Component
{
    public function placeholder()
    {
        return view("livewire.loading");
    }
    public function render()
    {
        return view('livewire.pages.location');
    }
}