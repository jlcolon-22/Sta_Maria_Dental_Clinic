<?php

namespace App\Livewire\Patient;

use Livewire\Component;
use Livewire\Attributes\Lazy;
use Illuminate\Support\Facades\Auth;
use App\Models\PatientAppointment as ModelsPatientAppointment;
use Livewire\WithPagination;


#[Lazy]
class PatientAppointment extends Component
{
    use WithPagination;
    public $search ='';
    public function placeholder()
    {
        return view("livewire.loading");


    }

    public function cancelAppointment(ModelsPatientAppointment $id)
    {
          $id->update([
            'status'=>2
          ]);
    }
    public function render()
    {
        if(!!$this->search)
        {
            $appointments = ModelsPatientAppointment::with('branchInfo')->where('patient_id',Auth::guard('patient')->id())->whereDate('date',$this->search)->latest()->paginate(10);
        }else{
            $appointments = ModelsPatientAppointment::with('branchInfo')->where('patient_id',Auth::guard('patient')->id())->latest()->paginate(10);
        }
        return view('livewire.patient.patient-appointment',compact('appointments'));
    }
}
