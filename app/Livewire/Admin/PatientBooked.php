<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use Livewire\Attributes\Lazy;
use App\Models\PatientAppointment;
use Illuminate\Support\Facades\Auth;

#[Lazy]
class PatientBooked extends Component
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
         $appointments = PatientAppointment::with('doctorInfo')->where('branch_id',Auth::guard('web')->id())->where('status',1)->whereDate('date',$this->search)->latest()->paginate(10);
        }else{
         $appointments = PatientAppointment::with('doctorInfo')->where('branch_id',Auth::guard('web')->id())->where('status',1)->latest()->paginate(10);
        }

        return view('livewire.admin.patient-booked',compact('appointments'));
    }
}
