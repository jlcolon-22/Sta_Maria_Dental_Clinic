<?php

namespace App\Livewire\Patient;

use Livewire\Component;
use App\Models\PatientAccount;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use Livewire\Attributes\Lazy;

// #[Lazy]
class PatientSetting extends Component
{
    public $pfullname = '';
    public $pemail = '';
    public $pnumber = '';
    public $page = '';
    public $username = '';
    public $password = '';
    public function mount()
    {
        if (Auth::guard('patient')->check()) {
            $this->pfullname = Auth::guard('patient')->user()->fullname;
            $this->pemail = Auth::guard('patient')->user()->email;
            $this->pnumber = Auth::guard('patient')->user()->number;
            $this->page = (int)Auth::guard('patient')->user()->age;
            $this->username = Auth::guard('patient')->user()->username;
        }
    }
    public function rules()
    {
        return [
            'pemail' => 'required|email|unique:doctor_accounts,email',
            'password' => [Password::min(8)->numbers()->mixedCase()->letters()
                ->symbols()],
            'pfullname' => ['required'],
            'page' => ['required'],
            'pnumber' => 'required|numeric|digits:11',
            'username' => ['required'],
        ];
    }
    public function updatePatient()
    {
        $this->validate();
        PatientAccount::query()->where('id', Auth::guard('patient')->id())->update([
            'email' => $this->pemail,
            'number' => $this->pnumber,
            'age' => $this->page,

            'fullname' => $this->pfullname,
            'username' => $this->username,
        ]);
        if (!!$this->password) {
            PatientAccount::query()->where('id', Auth::guard('patient')->id())->update([
                'password' => Hash::make($this->password),
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
