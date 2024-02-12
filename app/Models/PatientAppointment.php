<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PatientAppointment extends Model
{
    use HasFactory;
    protected $fillable = [
        'fullname','age','email','status','number','procedure','patient_id','doctor_id','branch_id','date'
    ];

    public function branchInfo()
    {
        return $this->belongsTo(User::class,'branch_id');
    }
}