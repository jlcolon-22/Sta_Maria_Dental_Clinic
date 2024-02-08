<?php

namespace App\Livewire\Auth;

use Livewire\Component;
use Livewire\Attributes\Lazy;
use Illuminate\Validation\Rules\Password;

#[Lazy]
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
            'email' => 'required|email|unique:doctor_accounts,email',
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
    public function render()
    {
        sleep(1);
        return view('livewire.auth.patient-signup');
    }
}
