<?php

namespace App\Livewire\Admin;

use App\Models\DoctorAccount;
use App\Models\Inventory;
use Livewire\Component;
use Livewire\Attributes\Lazy;
use Livewire\Attributes\Layout;
use App\Models\PatientAppointment;
use Illuminate\Support\Facades\Auth;
use Jantinnerezo\LivewireAlert\LivewireAlert;

#[Lazy]
class Dashboard extends Component
{
    use LivewireAlert;
    public $search = '';
    public $warningInventory = [];

    public function mount()
    {

        $this->warningInventory = Inventory::where('quantity','<' , 10)->get()->toArray();

    }
    public function show()
    {

        $this->alert('success', 'Hello!', [
            'position' => 'top-end',
            'timer' => '2000',
            'toast' => true,
           ]);


    }
    public function placeholder()
    {
        return view("livewire.loading");
    }


    public function render()
    {
        $requestCount = PatientAppointment::where('branch_id',Auth::guard('web')->id())->where('status',0)->get()->count();
        $bookedCount = PatientAppointment::where('branch_id',Auth::guard('web')->id())->where('status',1)->get()->count();
        $doctorCount = DoctorAccount::where('branch_id',Auth::guard('web')->id())->get()->count();

        $appointments = PatientAppointment::with('doctorInfo')->where('status',0)->where('branch_id',Auth::guard('web')->id())->latest()->limit(10)->get();;
        return view('livewire.admin.dashboard',compact('appointments','requestCount','bookedCount','doctorCount'));
    }
}
