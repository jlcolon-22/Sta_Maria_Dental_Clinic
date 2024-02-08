<?php

namespace App\Livewire\Pages;

use App\Models\DoctorAccount;
use App\Models\DoctorSchedule;
use App\Models\User;
use Livewire\Attributes\Lazy;
use Livewire\Component;

#[Lazy]
class Appointment extends Component
{
    public $date = '';
    public $branch = '';
    public $doctor = '';
    public $allBranch = [];
    public $allDoctor = [];
    public $doctorNotAvailable = [];
    public $doctorSelect = false;
    public function mount()
    {
        $this->allBranch = User::select('branch_name','id')->get();
    }
    public function branch_change()
    {
       $this->allDoctor = DoctorAccount::select('id','branch_id','fullname')->where('branch_id', $this->branch)->get();
       $this->doctor = '';
       $this->date = '';
       $this->doctorSelect = false;
    }
    public function doctor_change()
    {

        $notavailable = [];
        $this->date = '';
        $this->doctorNotAvailable = [];
        $notavailable = DoctorSchedule::where('doctor_id', $this->doctor)->get('date');
        foreach($notavailable as $not)
        {
            $this->doctorNotAvailable[] = $not->date;
        }
        $this->doctorSelect = true;
    }
    public function store()
    {
        dd($this->date);
    }
    public function placeholder()
    {
        return view("livewire.loading");
    }
    public function render()
    {
        sleep(1);
        return view('livewire.pages.appointment');
    }
}
