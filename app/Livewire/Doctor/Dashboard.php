<?php

namespace App\Livewire\Doctor;

use Livewire\Component;
use Livewire\Attributes\Lazy;
use App\Models\PatientAppointment;
use Illuminate\Support\Facades\Auth;

#[Lazy]
class Dashboard extends Component
{
    public $search = '';
    public $patientHistory = [];

    public function showHistory($id)
    {
        $this->patientHistory = PatientAppointment::with('doctorInfo')->where('patient_id',$id)->latest()->get();

    }
    public function placeholder()
    {
        return view("livewire.loading");
    }

    public function render()
    {

        if(!!$this->search)
        {
         $appointments = PatientAppointment::where('doctor_id',Auth::guard('doctor')->id())->where('status',1)->whereDate('date',$this->search)->latest()->paginate(10);
        }else{
         $appointments = PatientAppointment::where('doctor_id',Auth::guard('doctor')->id())->where('status',1)->latest()->paginate(10);
        }

        return view('livewire.doctor.dashboard',compact('appointments'));
    }
}
