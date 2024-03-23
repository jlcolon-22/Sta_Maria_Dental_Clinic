<?php

namespace App\Livewire\Auth;

use Carbon\Carbon;
use App\Models\Otp;
use Livewire\Component;
use Livewire\Attributes\Lazy;
use App\Models\PatientAccount;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

#[Lazy]
class PatientResetPassword extends Component
{
    public $id = null;
    public $password = '';
    public $password_confirmation = '';
    public function mount($id)
    {
            $this->id = $id;


    }
    public function reset_password()
    {
        $this->validate([
            'password' => 'min:6',
            'password_confirmation' => 'required_with:password|same:password|min:6'
        ]);
        $check = Otp::where('id',$this->id)->first();
        $user = PatientAccount::where('id',$check->user_id)->first();
        $user->update(
            [
                'password'=> Hash::make($this->password),
            ]
        );
        Auth::guard('patient')->login($user);
        return redirect('/');

    }
    public function placeholder()
    {
        return view("livewire.loading");
    }
    public function render()
    {
        $check = Otp::where('id',$this->id)->first();

        $now = Carbon::now();

        $diff = $check->created_at->diffInMinutes($now);
        if($diff <= 60)
        {

             return view('livewire.auth.patient-reset-password');
        }else{
            Session::flash('expired','true');
             return view('livewire.auth.patient-reset-password');
        }


    }
}
