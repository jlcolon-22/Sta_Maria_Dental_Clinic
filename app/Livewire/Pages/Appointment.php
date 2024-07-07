<?php

namespace App\Livewire\Pages;

use Carbon\Carbon;
use App\Models\User;
use Livewire\Component;
use App\Models\DoctorAccount;
use Livewire\Attributes\Lazy;
use App\Models\DoctorSchedule;
use App\Models\PatientAccount;
use App\Models\PatientAppointment;
use Illuminate\Support\Facades\Auth;

// #[Lazy]
class Appointment extends Component
{
    public $date = '';
    public $branch = '';
    public $doctor = '';
    public $procedure = '';
    public $fullname = '';
    public $email = '';
    public $number = '';
    public $age = '';



    public $allBranch = [];
    public $allDoctor = [];
    public $doctorNotAvailable = [];
    public $doctorSelect = false;
    public function rules()
    {
        return [
            'email' => 'required|email|unique:doctor_accounts,email',
            'fullname' => ['required'],
            'number' => 'required|numeric|digits:11',
            'doctor' => ['required'],
            'age' => ['required'],
            'branch' => ['required'],
            'date' => ['required'],
            'procedure' => ['required'],
        ];
    }
    public function mount()
    {
        $this->allBranch = User::select('branch_name', 'id')->get();
        if (Auth::guard("patient")->check()) {
            $this->fullname = Auth::guard("patient")->user()->fullname;
            $this->number = Auth::guard("patient")->user()->number;
            $this->email = Auth::guard("patient")->user()->email;

        }

    }
    public function branch_change()
    {
        $this->allDoctor = DoctorAccount::select('id', 'branch_id', 'fullname')->where('branch_id', $this->branch)->get();
        $this->doctor = '';
        $this->date = '';
        $this->doctorSelect = false;
    }
    public function doctor_change()
    {
        $this->doctorNotAvailable = [];
        // $alreadyAppointment = PatientAppointment::select('date')->whereDate('date','>=', Carbon::now())->get();
        // if(count($alreadyAppointment) > 0)
        // {
        //     foreach ($alreadyAppointment as $already) {

        //         $this->doctorNotAvailable[] = Carbon::parse($already->date)->format('Y-m-d');
        //     }
        // }

        if (!!$this->doctor) {
            $notavailable = [];
            $this->date = '';

            $notavailable = DoctorSchedule::where('doctor_id', $this->doctor)->get('date');

            if(count($notavailable) > 0)
            {
                foreach ($notavailable as $not) {
                    $this->doctorNotAvailable[] = $not->date;
                }
            }
            else{
                $this->doctorNotAvailable = ['no_available'];
            }

            $this->doctorSelect = true;

        }

        if($this->doctor == 'no_available')
        {
            $this->doctor = '';
            $this->date = '';
            $this->doctorSelect = false;
        }
    }
    public function store()
    {

        if (Auth::guard('patient')->check()) {
            $this->validate();
            PatientAppointment::query()->create([
                'email' => $this->email,
                'fullname' => $this->fullname,
                'number' => $this->number,
                'doctor_id' => $this->doctor,
                'age' => $this->age,
                'branch_id' => $this->branch,
                'date' => Carbon::parse($this->date),
                'procedure' => $this->procedure,
                'patient_id' => Auth::guard('patient')->id(),
            ]);
            $this->email = '';
            $this->fullname = '';
            $this->number = '';
            $this->doctor = '';
            $this->age = '';
            $this->branch = '';
            $this->date = '';
            $this->procedure = '';
            $this->doctorSelect = false;
            $this->dispatch('added');
        } else {
            $this->dispatch('loginfirst');
        }
    }
    public function placeholder()
    {
        return view("livewire.loading");
    }
    public function render()
    {

        return view('livewire.pages.appointment');
    }
}
