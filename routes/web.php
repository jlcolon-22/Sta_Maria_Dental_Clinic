<?php

use App\Livewire\Loading;
use App\Livewire\Auth\Type;
use App\Livewire\Auth\Login;
use App\Livewire\Admin\Setting;
use App\Livewire\Pages\Homepage;
use App\Livewire\Pages\Location;
use App\Livewire\Pages\Services;
use App\Livewire\Admin\Dashboard;
use App\Livewire\Admin\Inventory;
use App\Livewire\Auth\AdminLogin;
use App\Livewire\Auth\DoctorCode;
use App\Livewire\Doctor\Schedule;
use App\Livewire\Auth\DoctorLogin;
use App\Livewire\Auth\DoctorForget;
use App\Livewire\Auth\PatientLogin;
use App\Livewire\Pages\Appointment;
use App\Livewire\Auth\PatientForget;
use App\Livewire\Auth\PatientSignup;
use Illuminate\Support\Facades\Http;
use App\Livewire\Admin\DoctorAccount;
use App\Livewire\Admin\PatientBooked;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Route;
use App\Livewire\Admin\PatientRequest;
use App\Livewire\Doctor\DoctorSetting;
use App\Http\Controllers\AuthController;
use App\Livewire\Auth\DoctorResetMessage;
use App\Http\Controllers\BotManController;
use App\Livewire\Auth\DoctorResetPassword;
use App\Livewire\Auth\PatientResetPassword;
use App\Livewire\Patient\PatientAppointment;
use App\Livewire\Doctor\Dashboard as DoctorDashboard;

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
Route::get('/auth/patient/signup', PatientSignup::class);
Route::get('/auth/patient/forget', PatientForget::class);
Route::get('/auth/patient/reset_password/{id}',PatientResetPassword::class);

Route::get('/auth/doctor/login', DoctorLogin::class);
Route::get('/auth/doctor/forget', DoctorForget::class);
Route::get('/auth/doctor/code/{id}', DoctorCode::class);
Route::get('/auth/reset_password/success', DoctorResetMessage::class);
Route::get('/auth/doctor/reset_password/{id}',DoctorResetPassword::class);


Route::get('/admin/login', AdminLogin::class);
Route::get('/admin',function(){
    return redirect('/admin/login');
});
Route::middleware(['admin_only'])->prefix('admin')->group(function () {

    Route::get('logout', [AuthController::class,'adminLogout']);

    Route::get('dashboard', Dashboard::class);
    Route::get('inventory', Inventory::class);
    Route::get('doctor-account', DoctorAccount::class);
    Route::get('patient-request', PatientRequest::class);
    Route::get('patient-confirmed', PatientBooked::class);

    Route::get('setting', Setting::class);
});
Route::middleware(['doctor_only'])->prefix('doctor')->group(function () {
    Route::get('dashboard', DoctorDashboard::class);
    Route::get('schedule', Schedule::class);
    Route::get('setting', DoctorSetting::class);

    Route::get('logout', [AuthController::class,'doctorLogout']);

});
Route::middleware(['patient_only'])->prefix('patient')->group(function () {

    Route::get('logout', [AuthController::class,'patientLogout']);
    Route::get('appointment', PatientAppointment::class);

});


Route::match(['get', 'post'], 'botman', [BotManController::class, 'handle']);
Route::get('/send',function()
{
    $response = Http::post('https://api.semaphore.co/api/v4/messages', [
        'apikey' => 'a1398f27fe149bb183094ecc07c84de6',
        'message' => 'ddsadad',
        'number'=>'09705078270',
        'sendername' => 'SEMAPHORE'
    ]);
});
