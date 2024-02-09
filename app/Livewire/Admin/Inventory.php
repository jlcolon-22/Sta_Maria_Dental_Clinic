<?php

namespace App\Livewire\Admin;

use Livewire\Component;

use Livewire\WithPagination;
use Livewire\Attributes\Lazy;
use Livewire\Attributes\Layout;
use Illuminate\Support\Facades\Auth;
use SebastianBergmann\CodeCoverage\Report\Xml\Project;

#[Lazy]
class Inventory extends Component
{
    use WithPagination;
    public $data = [
        'name'=>'',
        'quantity'=>1,

    ];
    public $branch_id;
    public $id = null;
    public $search = '';
    public function mount()
    {
        $this->branch_id = Auth::guard('web')->id();
    }
    public function store()
    {
        \App\Models\Inventory::create([
            'product_name'=> $this->data['name'],
            'quantity'=> $this->data['quantity'],
            'branch_id'=> $this->branch_id,

        ]);
        $this->data['name'] = '';
        $this->data['quantity'] = 1;
        $this->dispatch('added');
    }
    public function edit(\App\Models\Inventory $id)
    {
        $this->id = $id->id;
        $this->data['name'] = $id->product_name;
        $this->data['quantity'] = $id->quantity;


    }
    public function update()
    {
        \App\Models\Inventory::where('id',$this->id)->update([
            'product_name'=> $this->data['name'],
            'quantity'=> $this->data['quantity'],
        ]);
        $this->dispatch('updated');
    }
    public function delete($inventory)
    {
        \App\Models\Inventory::where('id',$inventory)->delete();
    }


    public function placeholder()
    {
        return view("livewire.loading");
    }
    public function render()
    {

        $inventories = \App\Models\Inventory::where('product_name','LIKE', '%'.$this->search.'%')->orWhere('id','LIKE', '%'.$this->search.'%')->where('branch_id', Auth::guard('web')->id())->latest()->paginate(10);

        return view('livewire.admin.inventory',compact('inventories'));
    }
}
