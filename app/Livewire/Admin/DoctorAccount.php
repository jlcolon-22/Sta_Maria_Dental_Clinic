<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use Livewire\Attributes\Lazy;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;
use App\Models\DoctorAccount as ModelsDoctorAccount;
use Illuminate\Support\Facades\Hash;

#[Lazy]
class DoctorAccount extends Component
{
    public $fullname = '';
    public $email = '';
    public $number = '';
    public $password = '';
    public $search = '';
    public $id = '';
    public function rules()
    {
        return [
            'email' => 'required|email|unique:doctor_accounts,email',
            'password' => ['required', Password::min(8) ->numbers()->mixedCase()->letters()
            ->symbols()],
            'fullname' => ['required'],
            'number' => ['required'],
        ];
    }

    public function store()
    {
        $this->validate();
        ModelsDoctorAccount::create([
            'email'=> $this->email,
            'number'=> $this->number,
            'password'=>Hash::make($this->password),
            'fullname'=> $this->fullname,
            'branch_id'=>Auth::guard('web')->id()
        ]);
        $this->dispatch('added');
    }

    public function edit(ModelsDoctorAccount $id)
    {
        $this->fullname = $id->fullname;
        $this->email = $id->email;
        $this->number = $id->number;
        $this->id = $id->id;

    }
    public function update()
    {
        ModelsDoctorAccount::where('id',$this->id)->update([
            'email'=> $this->email,
            'number'=> $this->number,
            'fullname'=> $this->fullname,

        ]);
        if(!!$this->password)
        {
            ModelsDoctorAccount::where('id',$this->id)->update([
                'password'=>Hash::make($this->password),
            ]);
        }
        $this->dispatch('updated');
    }
    public function change_status(ModelsDoctorAccount $id)
    {

        $id->update([
            'status' => !$id->status
        ]);
    }

    public function destroy(ModelsDoctorAccount $id)
    {
        $id->delete();
    }
    public function placeholder()
    {
        return view("livewire.loading");
    }
    public function render()
    {
        $doctorAccounts = ModelsDoctorAccount::where('branch_id', Auth::guard('web')->id())->where('fullname','LIKE', '%'.$this->search.'%')->latest()->paginate(10);
        return view('livewire.admin.doctor-account',compact('doctorAccounts'));
    }
}
