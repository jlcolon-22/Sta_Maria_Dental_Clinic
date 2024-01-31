<?php

namespace App\Livewire\Doctor;

use Livewire\Component;
use App\Models\DoctorSchedule;
use Illuminate\Support\Facades\Auth;

class Schedule extends Component
{

    public function disabledDate($date)
    {

        $check = DoctorSchedule::where("date", $date)->where("doctor_id", Auth::guard('doctor')->id())->first();
        if($check)
        {
            $value = [
                'id'=>$check->id
            ];
            $check->delete();
        }else{
            $value = DoctorSchedule::create([
                'date'=>$date,
                'doctor_id'=>Auth::guard('doctor')->id()
            ]);
        }

        // $schedule = DoctorSchedule::where("doctor_id", Auth::guard('doctor')->id())->get();
        $this->dispatch('added',$value);
    }
    public function render()
    {
        $schedules = DoctorSchedule::where("doctor_id", Auth::guard('doctor')->id())->get();
        return view('livewire.doctor.schedule',compact('schedules'));
    }
}
