<?php

namespace App\Livewire\Admin;

use Livewire\Attributes\Layout;
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
        sleep(1);
        return view('livewire.admin.dashboard');
    }
}
