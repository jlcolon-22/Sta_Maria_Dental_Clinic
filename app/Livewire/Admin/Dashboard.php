<?php

namespace App\Livewire\Admin;

use App\Models\DoctorAccount;
use Livewire\Component;
use Livewire\Attributes\Lazy;
use Livewire\Attributes\Layout;
use App\Models\PatientAppointment;
use Illuminate\Support\Facades\Auth;


#[Lazy]
class Dashboard extends Component
{
    public $search = '';

    public function placeholder()
    {
        return view("livewire.loading");
    }


    public function render()
    {
        $requestCount = PatientAppointment::where('status',0)->get()->count();
        $bookedCount = PatientAppointment::where('status',1)->get()->count();
        $doctorCount = DoctorAccount::where('branch_id',Auth::guard('web')->id())->get()->count();

        $appointments = PatientAppointment::with('doctorInfo')->where('status',0)->where('branch_id',Auth::guard('web')->id())->latest()->limit(10)->get();;
        return view('livewire.admin.dashboard',compact('appointments','requestCount','bookedCount','doctorCount'));
    }
}
