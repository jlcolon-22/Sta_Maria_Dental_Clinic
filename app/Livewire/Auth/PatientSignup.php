<?php

namespace App\Livewire\Auth;

use Livewire\Component;
use Livewire\Attributes\Lazy;
use App\Models\PatientAccount;
use App\Mail\VerificationEmail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Validation\Rules\Password;

// #[Lazy]
class PatientSignup extends Component
{
    public $fullname = '';
    public $email = '';
    public $number = '';
    public $age = '';
    public $username = '';
    public $password = '';
    public $password_confirmation = '';
    public function rules()
    {
        return [
            'email' => 'required|email|unique:patient_accounts,email',
            'password' => ['required','confirmed', Password::min(8) ->numbers()->mixedCase()->letters()
            ->symbols()],
            'fullname' => ['required'],
            'age' => ['required'],
            'number' => 'required|numeric|digits:11',
            'username' => ['required'],
            'password_confirmation' => ['required'],
        ];
    }
    public function placeholder()
    {
        return view("livewire.loading");
    }
    public function store()
    {
        // $link = request()->root().'/'.Crypt::encryptString('sdadad');


        $this->validate();
        $patient = PatientAccount::create([
            'email'=> $this->email,
            'number'=> $this->number,
            'age'=> $this->age,
            'password'=>Hash::make($this->password),
            'fullname'=> $this->fullname,
            'username'=> $this->username,

        ]);

        $link = route('patient.verification',['id'=>Crypt::encryptString($patient->id)]);

        Mail::to($this->email)->send(new VerificationEmail($link));
        session()->flash('success', 'An email verification link has been sent to your email account. Please check your inbox!');
        $this->reset();
        // Auth::guard('patient')->login($patient);
        // $this->dispatch('added');
    }
    public function render()
    {

        return view('livewire.auth.patient-signup');
    }
}
