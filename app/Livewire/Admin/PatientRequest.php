<?php

namespace App\Livewire\Admin;

use Carbon\Carbon;
use Livewire\Component;
use App\Models\DoctorAccount;
use Livewire\Attributes\Lazy;
use Livewire\WithFileUploads;
use App\Models\DoctorSchedule;
use App\Models\PatientAppointment;
use Illuminate\Support\Facades\Auth;

#[Lazy]
class PatientRequest extends Component
{
    use WithFileUploads;
    public $search = '';
    public $allDoctor = [];
    public $doctorNotAvailable = [];

    public $date = '';
    public $branch = '';
    public $doctor = '';
    public $procedure = '';
    public $fullname = '';
    public $email = '';
    public $number = '';
    public $age = '';
    public $appId = '';


    public function mount()
    {
        $this->allDoctor = DoctorAccount::where('branch_id','=', Auth::guard('web')->id())->get();
    }
    public function placeholder()
    {
        return view("livewire.loading");


    }
    public function confirmAppointment(PatientAppointment $id)
    {
        $id->update([
            'status' => 1
        ]);
        $this->dispatch('confirm');
    }
    public function rejectAppointment(PatientAppointment $id)
    {
        $id->update([
            'status' => 3
        ]);

    }
    public function edit(PatientAppointment $id)
    {

        $this->appId = $id->id;
        $this->fullname = $id->fullname;
        $this->email = $id->email;
        $this->number = $id->number;
        $this->age = $id->age;
        $this->date = Carbon::parse($id->date)->format('Y-m-d h:i A');
        $this->procedure = $id->procedure;
        $this->doctor = $id->doctor_id;
        $this->doctor_change();
    }
    public function doctor_change()
    {

        if (!!$this->doctor) {
            $notavailable = [];

            $this->doctorNotAvailable = [];
            $notavailable = DoctorSchedule::where('doctor_id', $this->doctor)->get('date');
            foreach ($notavailable as $not) {
                $this->doctorNotAvailable[] = $not->date;
            }

        }
    }

    public function update()
    {
        PatientAppointment::where('id', $this->appId)->update([
            'email' => $this->email,
            'fullname' => $this->fullname,
            'number' => $this->number,
            'doctor_id' => $this->doctor,
            'age' => $this->age,
            'date' => Carbon::parse($this->date),
            'procedure' => $this->procedure,

        ]);
        $this->dispatch('updated');
    }
    public function render()
    {
       if(!!$this->search)
       {
        $appointments = PatientAppointment::with('doctorInfo')->where('branch_id',Auth::guard('web')->id())->where('status',0)->whereDate('date',$this->search)->latest()->paginate(10);
       }else{
        $appointments = PatientAppointment::with('doctorInfo')->where('branch_id',Auth::guard('web')->id())->where('status',0)->latest()->paginate(10);
       }

        return view('livewire.admin.patient-request',compact('appointments'));
    }
}
