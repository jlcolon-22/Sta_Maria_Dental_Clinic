<?php

namespace App\Livewire\Admin;

use Livewire\Component;

use Livewire\Attributes\Lazy;
use Livewire\Attributes\Layout;

#[Lazy]
class Inventory extends Component
{

    public $data = [
        'name'=>'',
        'quantity'=>1
    ];
    public function store()
    {
        \App\Models\Inventory::create([
            'product_name'=> $this->data['name'],
            'quantity'=> $this->data['quantity'],
            'branch_id'=> 1,

        ]);
        $this->data['name'] = '';
        $this->data['quantity'] = 1;
        $this->dispatch('somethingUpdated');
    }
    public function placeholder()
    {
        return view("livewire.loading");
    }
    public function render()
    {
        return view('livewire.admin.inventory');
    }
}
