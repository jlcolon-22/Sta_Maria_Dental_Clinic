<?php

namespace App\Livewire\Auth;

use App\Models\Otp;
use Livewire\Component;
use Illuminate\Support\Str;
use App\Models\DoctorAccount;
use Carbon\Carbon;
use Livewire\Attributes\Lazy;
use Livewire\Attributes\Validate;

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

            return redirect('/auth/doctor/code/'.$uuid);
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
        sleep(1);
        return view('livewire.auth.doctor-forget');
    }
}
