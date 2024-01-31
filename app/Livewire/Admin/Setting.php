<?php

namespace App\Livewire\Admin;

use App\Models\User;
use Livewire\Component;
use Livewire\Attributes\Lazy;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
#[Lazy]
class Setting extends Component
{

    public $email;
    public $name;
    public $number;
    public $password;
    public function mount()
    {
        $this->email = Auth::guard('web')->user()->branch_email;
        $this->number = Auth::guard('web')->user()->branch_number;
        $this->name = Auth::guard('web')->user()->branch_name;

    }
    public function update()
    {

        User::where('id',Auth::guard('web')->user()->id)->update([
            'branch_name'=>$this->name,
            'branch_email'=>$this->email,
            'branch_number'=>$this->number,

        ]);
        if(!!$this->password)
        {
            User::where('id',Auth::guard('web')->user()->id)->update([
                'password'=>Hash::make($this->name),
            ]);
        }
        $this->dispatch('updated');
    }
    public function placeholder()
    {
        return view("livewire.loading");
    }
    public function render()
    {
        return view('livewire.admin.setting');
    }
}
