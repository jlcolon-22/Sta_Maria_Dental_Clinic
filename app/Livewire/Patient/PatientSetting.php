<?php

namespace App\Livewire\Patient;

use Livewire\Component;
use App\Models\PatientAccount;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use Livewire\Attributes\Lazy;

#[Lazy]
class PatientSetting extends Component
{
    public $fullname = '';
    public $email = '';
    public $number = '';
    public $username = '';
    public $password = '';
    public function mount()
    {
       if(Auth::guard('patient')->check()) {
        $this->fullname = Auth::guard('patient')->user()->fullname;
        $this->email = Auth::guard('patient')->user()->email;
        $this->number = Auth::guard('patient')->user()->number;
        $this->username = Auth::guard('patient')->user()->username;
    }
    }
    public function rules()
    {
        return [
            'email' => 'required|email|unique:doctor_accounts,email',
            'password' => [ Password::min(8) ->numbers()->mixedCase()->letters()
            ->symbols()],
            'fullname' => ['required'],
            'number' => 'required|numeric|digits:11',
            'username' => ['required'],
        ];
    }
    public function updatePatient()
    {
        $this->validate();
        PatientAccount::query()->where('id', Auth::guard('patient')->id())->update([
            'email'=> $this->email,
            'number'=> $this->number,

            'fullname'=> $this->fullname,
            'username'=> $this->username,
        ]);
        if(!!$this->password)
        {
            PatientAccount::query()->where('id', Auth::guard('patient')->id())->update([
            'password'=>Hash::make($this->password),
                ]);
        }
        $this->dispatch('updated');
    }
    public function placeholder()
    {
        return view("livewire.loading");


    }
    public function render()
    {
        return view('livewire.patient.patient-setting');
    }
}
