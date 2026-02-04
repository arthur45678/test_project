<?php

use App\Http\Controllers\DoctorController;
use App\Http\Controllers\PatientController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('/doctors/{doctor}', [DoctorController::class,'show']);

Route::middleware('auth')->group(function () {
    Route::get('/doctor', [DoctorController::class, 'index'])
        ->name('doctor.dashboard');


    // Diseases
    Route::resource('diseases', App\Http\Controllers\DiseaseController::class);

    // Patients
    Route::resource('patients', App\Http\Controllers\PatientController::class);
});
