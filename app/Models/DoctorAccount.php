<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
class DoctorAccount extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $fillable = [
    "fullname","email","branch_id","number","password","status",
    ];
}
