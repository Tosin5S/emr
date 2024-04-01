<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DiagnosisController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\LaboratoryTechnicianController;
use App\Http\Controllers\LaborersController;
use App\Http\Controllers\LabResultController;
use App\Http\Controllers\MedicalHistoryController;
use App\Http\Controllers\NurseController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\PharmacistController;
use App\Http\Controllers\PrescriptionController;
use App\Http\Controllers\RegistrarController;
use App\Http\Controllers\RegistrationController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

# Route::apiResource('posts', PostController::class)->middleware('auth:sanctum');

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/auth/register', [AuthController::class, 'createUser']);
Route::post('/auth/login', [AuthController::class, 'loginUser']);

# diagnosis
Route::get('/diagnosis',[DiagnosisController::class, 'index']);
Route::get('/diagnosis/{id}',[DiagnosisController::class, 'show']);
Route::post('/diagnosis',[DiagnosisController::class, 'store']);
Route::put('/diagnosis/{id}',[DiagnosisController::class, 'update']);
Route::delete('/diagnosis/{id}',[DiagnosisController::class, 'destroy']);

# doctor
Route::get('/doctor',[DoctorController::class, 'index']);
Route::get('/doctor/{id}',[DoctorController::class, 'show']);
Route::post('/doctor',[DoctorController::class, 'store']);
Route::put('/doctor/{id}',[DoctorController::class, 'update']);
Route::delete('/doctor/{id}',[DoctorController::class, 'destroy']);

# lab tech
Route::get('/labtech',[LaboratoryTechnicianController::class, 'index']);
Route::get('/labtech/{id}',[LaboratoryTechnicianController::class, 'show']);
Route::post('/labtech',[LaboratoryTechnicianController::class, 'store']);
Route::put('/labtech/{id}',[LaboratoryTechnicianController::class, 'update']);
Route::delete('/labtech/{id}',[LaboratoryTechnicianController::class, 'destroy']);

# laborer
Route::get('/laborer',[LaborersController::class, 'index']);
Route::get('/laborer/{id}',[LaborersController::class, 'show']);
Route::post('/laborer',[LaborersController::class, 'store']);
Route::put('/laborer/{id}',[LaborersController::class, 'update']);
Route::delete('/laborer/{id}',[LaborersController::class, 'destroy']);

# lab result
Route::get('/labresult',[LabResultController::class, 'index']);
Route::get('/labresult/{id}',[LabResultController::class, 'show']);
Route::post('/labresult',[LabResultController::class, 'store']);
Route::put('/labresult/{id}',[LabResultController::class, 'update']);
Route::delete('/labresult/{id}',[LabResultController::class, 'destroy']);

# medical history
Route::get('/medicalhistory',[MedicalHistoryController::class, 'index']);
Route::get('/medicalhistory/{id}',[MedicalHistoryController::class, 'show']);
Route::post('/medicalhistory',[MedicalHistoryController::class, 'store']);
Route::put('/medicalhistory/{id}',[MedicalHistoryController::class, 'update']);
Route::delete('/medicalhistory/{id}',[MedicalHistoryController::class, 'destroy']);

# nurse
Route::get('/nurse',[NurseController::class, 'index']);
Route::get('/nurse/{id}',[NurseController::class, 'show']);
Route::post('/nurse',[NurseController::class, 'store']);
Route::put('/nurse/{id}',[NurseController::class, 'update']);
Route::delete('/nurse/{id}',[NurseController::class, 'destroy']);

# patient
Route::get('/patient',[PatientController::class, 'index']);
Route::get('/patient/{id}',[PatientController::class, 'show']);
Route::post('/patient',[PatientController::class, 'store']);
Route::put('/patient/{id}',[PatientController::class, 'update']);
Route::delete('/patient/{id}',[PatientController::class, 'destroy']);

# pharmacist
Route::get('/pharmacist',[PharmacistController::class, 'index']);
Route::get('/pharmacist/{id}',[PharmacistController::class, 'show']);
Route::post('/pharmacist',[PharmacistController::class, 'store']);
Route::put('/pharmacist/{id}',[PharmacistController::class, 'update']);
Route::delete('/pharmacist/{id}',[PharmacistController::class, 'destroy']);

# prescription
Route::get('/prescription',[PrescriptionController::class, 'index']);
Route::get('/prescription/{id}',[PrescriptionController::class, 'show']);
Route::post('/prescription',[PrescriptionController::class, 'store']);
Route::put('/prescription/{id}',[PrescriptionController::class, 'update']);
Route::delete('/prescription/{id}',[PrescriptionController::class, 'destroy']);

# registrar
Route::get('/registrar',[RegistrarController::class, 'index']);
Route::get('/registrar/{id}',[RegistrarController::class, 'show']);
Route::post('/registrar',[RegistrarController::class, 'store']);
Route::put('/registrar/{id}',[RegistrarController::class, 'update']);
Route::delete('/registrar/{id}',[RegistrarController::class, 'destroy']);

# registration
Route::get('/registration',[RegistrationController::class, 'index']);
Route::get('/registration/{id}',[RegistrationController::class, 'show']);
Route::post('/registration',[RegistrationController::class, 'store']);
Route::put('/registration/{id}',[RegistrationController::class, 'update']);
Route::delete('/registration/{id}',[RegistrationController::class, 'destroy']);