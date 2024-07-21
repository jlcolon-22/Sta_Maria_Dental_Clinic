<?php

namespace App\Livewire\Auth;

use Illuminate\Support\Facades\Crypt;
use Livewire\Component;

class Verification extends Component
{

    public function mount($id)
    {
        $newId = Crypt::decryptString($id);
        \App\Models\PatientAccount::where('id',$newId)->update(['verify'=>1]);
    }
    public function render()
    {
        return view('livewire.auth.verification');
    }
}
