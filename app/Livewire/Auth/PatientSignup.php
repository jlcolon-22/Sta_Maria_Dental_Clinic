<?php

namespace App\Livewire\Auth;

use Livewire\Component;
use Livewire\Attributes\Lazy;
use App\Models\PatientAccount;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

// #[Lazy]
class PatientSignup extends Component
{
    public $fullname = '';
    public $email = '';
    public $number = '';
    public $username = '';
    public $password = '';
    public function rules()
    {
        return [
            'email' => 'required|email|unique:patient_accounts,email',
            'password' => ['required', Password::min(8) ->numbers()->mixedCase()->letters()
            ->symbols()],
            'fullname' => ['required'],
            'number' => 'required|numeric|digits:11',
            'username' => ['required'],
        ];
    }
    public function placeholder()
    {
        return view("livewire.loading");
    }
    public function store()
    {
        $this->validate();
        $patient = PatientAccount::create([
            'email'=> $this->email,
            'number'=> $this->number,
            'password'=>Hash::make($this->password),
            'fullname'=> $this->fullname,
            'username'=> $this->username,

        ]);
        Auth::guard('patient')->login($patient);
        $this->dispatch('added');
    }
    public function render()
    {

        return view('livewire.auth.patient-signup');
    }
}
