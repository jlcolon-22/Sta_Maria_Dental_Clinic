<?php

namespace App\Livewire\Auth;

use Carbon\Carbon;
use App\Models\Otp;
use Livewire\Component;
use Illuminate\Support\Str;
use App\Models\DoctorAccount;
use Livewire\Attributes\Lazy;
use Livewire\Attributes\Validate;
use App\Mail\doctorSendForgotLink;
use Illuminate\Support\Facades\Mail;

#[Lazy]
class DoctorForget extends Component
{
    #[Validate('required|email')]
    public $email = '';

    public function checkEmail()
    {
        $this->validate();
        $check = DoctorAccount::where('email', $this->email)->first();
        if ($check) {
            $code = random_int(100000, 999999);
            $uuid = Str::uuid();
            $otp = Otp::create([
                'id'=>$uuid,
                'user_id'=>$check->id,
                'code'=> $code,
                'time_left'=>Carbon::now()
            ]);
            $data = [
                'link'=>'http://127.0.0.1:8000/auth/doctor/reset_password/'.$uuid
            ];
            Mail::to($check->email)->send(new doctorSendForgotLink($data));
            return redirect('/auth/reset_password/success');
        }else{
            session()->flash('error-email', 'true');
        }

    }

    public function placeholder()
    {
        return view("livewire.loading");
    }
    public function render()
    {

        return view('livewire.auth.doctor-forget');
    }
}
