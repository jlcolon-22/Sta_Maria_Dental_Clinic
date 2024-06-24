<?php

namespace App\Livewire\Admin;

use Carbon\Carbon;
use Livewire\Component;
use App\Models\DoctorAccount;
use Livewire\Attributes\Lazy;
use App\Models\DoctorSchedule;
use App\Models\PatientAppointment;
use Illuminate\Support\Facades\Auth;

#[Lazy]
class PatientBooked extends Component
{
    public $search = '';
    public $patientHistory = [];
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
        $this->doctorNotAvailable = [];
        $alreadyAppointment = PatientAppointment::select('date','doctor_id')->where('doctor_id', $this->doctor)->whereDate('date','>=', Carbon::now())->get();
        if(count($alreadyAppointment) > 0)
        {
            foreach ($alreadyAppointment as $already) {

                $this->doctorNotAvailable[] = Carbon::parse($already->date)->format('Y-m-d');
            }
        }
        if (!!$this->doctor) {
            $notavailable = [];


            $notavailable = DoctorSchedule::where('doctor_id', $this->doctor)->get('date');

            foreach ($notavailable as $not) {
                $this->doctorNotAvailable[] = $not->date;
            }

        }
    }
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
