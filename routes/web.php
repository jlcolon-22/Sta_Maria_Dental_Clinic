<?php

use App\Livewire\Loading;
use App\Livewire\Auth\Type;
use App\Livewire\Auth\Login;
use App\Livewire\Pages\Homepage;
use App\Livewire\Pages\Location;
use App\Livewire\Pages\Services;
use App\Livewire\Admin\Dashboard;
use App\Livewire\Admin\Inventory;
use App\Livewire\Auth\AdminLogin;
use App\Livewire\Auth\DoctorLogin;
use App\Livewire\Auth\PatientLogin;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Livewire\Admin\DoctorAccount;
use App\Livewire\Admin\Setting;
use App\Livewire\Doctor\Dashboard as DoctorDashboard;
use App\Livewire\Doctor\DoctorSetting;
use App\Livewire\Doctor\Schedule;
use App\Livewire\Pages\Appointment;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', Homepage::class);
Route::get('/x',function(){
    return view('welcome');
});
Route::get('/services', Services::class)->name('page_services')->lazy();
Route::get('/location', Location::class)->name('page.location');
Route::get('/appointment', Appointment::class)->name('page.appointment');
// auth route
Route::get('/auth/type', Type::class);
Route::get('/auth/patient/login', PatientLogin::class);
Route::get('/auth/doctor/login', DoctorLogin::class);

Route::get('/admin/login', AdminLogin::class);
Route::middleware(['admin_only'])->prefix('admin')->group(function () {

    Route::get('logout', [AuthController::class,'adminLogout']);

    Route::get('dashboard', Dashboard::class);
    Route::get('inventory', Inventory::class);
    Route::get('doctor-account', DoctorAccount::class);

    Route::get('setting', Setting::class);
});
Route::middleware(['doctor_only'])->prefix('doctor')->group(function () {
    Route::get('dashboard', DoctorDashboard::class);
    Route::get('schedule', Schedule::class);
    Route::get('setting', DoctorSetting::class);

    Route::get('logout', [AuthController::class,'doctorLogout']);

});
