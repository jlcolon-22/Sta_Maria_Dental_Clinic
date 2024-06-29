<?php

namespace App\Livewire\Doctor;

use Livewire\Component;
use Livewire\Attributes\Lazy;
use App\Models\PatientAppointment;
use Illuminate\Support\Facades\Auth;
use Livewire\WithFileUploads;

#[Lazy]
class Dashboard extends Component
{
    use WithFileUploads;
    public $search = '';
    public $patientHistory = [];

    public $image;
    public $description;

    public $ids = '';

    public function showHistory($id)
    {
        $this->patientHistory = PatientAppointment::with('doctorInfo')->where('patient_id', $id)->where('status',1)->orderByDesc('date')->get();
    }
    public function uploadFile()
    {


        if (!!$this->image) {
            $filename = time() . '.' . $this->image->extension();
            PatientAppointment::where('id', $this->ids)->update([
                'description' => $this->description,
                'image' => $filename
            ]);
            $this->image->storeAs('public/history',$filename);

        } else {
            PatientAppointment::where('id', $this->ids)->update([
                'description' => $this->description
            ]);
        }

        $this->dispatch('added');

        // $this->redirect('/doctor/dashboard');
    }

    public function edit($id)
    {
        $value = PatientAppointment::where('id', $id)->first();
        $this->description = $value->description;
    }
    public function placeholder()
    {
        return view("livewire.loading");
    }

    public function render()
    {

        if (!!$this->search) {
            $appointments = PatientAppointment::where('doctor_id', Auth::guard('doctor')->id())->where('status', 1)->whereDate('date', $this->search)->latest()->paginate(10);
        } else {
            $appointments = PatientAppointment::where('doctor_id', Auth::guard('doctor')->id())->where('status', 1)->latest()->paginate(10);
        }

        return view('livewire.doctor.dashboard', compact('appointments'));
    }
}
