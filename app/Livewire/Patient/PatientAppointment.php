<?php

namespace App\Livewire\Patient;

use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\Lazy;
use App\Models\DoctorSchedule;
use Illuminate\Support\Facades\Auth;
use App\Models\PatientAppointment as ModelsPatientAppointment;


// #[Lazy]
class PatientAppointment extends Component
{
    use WithPagination;
    public $search ='';
    public $date ='';
    public $doctorNotAvailable = [];

    public $appointmentId = '';

    public function showResched($id, $appId)
    {
        $this->doctorNotAvailable = [];
        $this->date = '';
        $this->appointmentId = '';
        $notavailable = DoctorSchedule::where('doctor_id', $id)->get('date');
        $this->appointmentId = $appId;
        if(count($notavailable) > 0)
        {
            foreach ($notavailable as $not) {
                $this->doctorNotAvailable[] = $not->date;
            }
        }else{
            $this->doctorNotAvailable = ['no_available'];
        }

    }
    public function resched()
    {
        \App\Models\PatientAppointment::where('id', $this->appointmentId)->update([
            'date'=>Carbon::parse($this->date),
            'status'=>0
        ]);
        $this->dispatch('updated');
    }
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
            $appointments = ModelsPatientAppointment::with('branchInfo','doctorInfo')->where('patient_id',Auth::guard('patient')->id())->whereDate('date',$this->search)->latest()->paginate(10);
        }else{
            $appointments = ModelsPatientAppointment::with('branchInfo','doctorInfo')->where('patient_id',Auth::guard('patient')->id())->latest()->paginate(10);
        }
        return view('livewire.patient.patient-appointment',compact('appointments'));
    }
}
