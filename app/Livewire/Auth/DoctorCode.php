<?php

namespace App\Livewire\Auth;

use Carbon\Carbon;
use App\Models\Otp;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\Attributes\Validate;

class DoctorCode extends Component
{
    public $vcode;
    #[Validate('required|digits:6')]
    public $code = '';
    public function mount($id)
    {
        $otp = Otp::where('id',$id)->latest()->first();

        $this->vcode = $otp->code;

    }
    public function resend()
    {
        $otp = Otp::where('code',$this->vcode)->latest()->first();
        $otp->update(['status'=>3]);
        $code = random_int(100000, 999999);
            $uuid = Str::uuid();
            $otp = Otp::create([
                'id'=>$uuid,
                'user_id'=>$otp->user_id,
                'code'=> $code,
                'time_left'=>Carbon::now()
            ]);
            return redirect('/auth/doctor/code/'.$uuid);
    }
    public function validate_code()
    {
        $this->validate();
        if($this->vcode == $this->code)
        {
            $otp = Otp::where('code',$this->vcode)->latest()->first();
            $now = Carbon::now();


            $seconds = Carbon::parse($otp->time_left)->diffInSeconds($now);

            if($seconds > 300)
            {
                session()->flash('expired','true');
            }else{
                $otp->update(['status'=>true]);
            }

        }else{
            session()->flash('wrong','true');
        }
    }
    public function render()
    {
        sleep(1);
        return view('livewire.auth.doctor-code');
    }
}
