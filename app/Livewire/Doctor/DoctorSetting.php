<?php

namespace App\Livewire\Doctor;

use Livewire\Component;
use App\Models\DoctorAccount;
use Livewire\Attributes\Lazy;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

#[Lazy]
class DoctorSetting extends Component
{
    public $email;
    public $name;
    public $number;
    public $password;
    public function mount()
    {
        $this->email = Auth::guard('doctor')->user()->email;
        $this->number = Auth::guard('doctor')->user()->number;
        $this->name = Auth::guard('doctor')->user()->fullname;
    }
    public function update()
    {

        DoctorAccount::where('id',Auth::guard('doctor')->user()->id)->update([
            'fullname'=>$this->name,
            'email'=>$this->email,
            'number'=>$this->number,

        ]);
        if(!!$this->password)
        {
            DoctorAccount::where('id',Auth::guard('doctor')->user()->id)->update([
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
        sleep(1);
        return view('livewire.doctor.doctor-setting');
    }
}
