<?php

use App\Livewire\Loading;
use App\Livewire\Auth\Type;
use App\Livewire\Auth\Login;
use App\Livewire\Pages\Homepage;
use App\Livewire\Pages\Location;
use App\Livewire\Pages\Services;
use App\Livewire\Admin\Dashboard;
use App\Livewire\Auth\DoctorLogin;
use App\Livewire\Auth\PatientLogin;
use Illuminate\Support\Facades\Route;

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
Route::get('/services', Services::class)->name('page_services')->lazy();
Route::get('/location', Location::class)->name('page.location');
// auth route
Route::get('/auth/type', Type::class);
Route::get('/auth/patient/login', PatientLogin::class);
Route::get('/auth/doctor/login', DoctorLogin::class);

Route::group(['prefix'=> 'admin'], function () {
    Route::get('dashboard', Dashboard::class)->lazy();
});
