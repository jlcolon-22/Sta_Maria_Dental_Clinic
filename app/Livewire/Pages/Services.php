<?php

namespace App\Livewire\Pages;

use Livewire\Component;
use Livewire\Attributes\Lazy;

#[Lazy]
class Services extends Component
{
    public $map = false;
    public $general = 3;
    public function changeGeneral($generalNum)
    {
        $this->general = $generalNum;
    }
    public function placeholder()
    {
        return view("livewire.loading");
    }
    public function render()
    {

        return view('livewire.pages.services');
    }
}
