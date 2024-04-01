<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MedicalHistory;

class MedicalHistoryController extends Controller
{
    public function index()
    {
        $medical_history = MedicalHistory::all();
        return response()->json($medical_history);
    }

    public function store(Request $request)
    {
        $medical_history = new MedicalHistory;
        $medical_history->patient_id = $request->patient_id;
        $medical_history->diagnosis_date = $request->diagnosis_date;
        $medical_history->medication_name = $request->medication_name;
        $medical_history->medication_dosage = $request->medication_dosage;
        $medical_history->medication_start_date = $request->medication_start_date;
        $medical_history->medication_end_date = $request->medication_end_date;
        $medical_history->allergies = $request->allergies;
        $medical_history->immunisation_date = $request->immunisation_date;
        $medical_history->immunisation_vaccine = $request->immunisation_vaccine;
        $medical_history->lab_result = $request->lab_result;
        $medical_history->referring_doctor = $request->referring_doctor;
        $medical_history->save();
        return response()->json([
            "message" => "MedicalHistory Added."
        ], 201);
    }

    public function show($id)
    {
        $medical_history =MedicalHistory::find($id);
        if(!empty($medical_history))
        {
            return response()->json($medical_history);
        }
        else
        {
            return response()->json([
                "message" => "Record not found"
            ], 404);
        }
    }

    public function update(Request $request, $id)
    {
        if (MedicalHistory::where('id', $id) -> exists()) {
            $medical_history = MedicalHistory::find($id);
            $medical_history->patient_id = is_null($request->patient_id) ? $medical_history->patient_id : $request->patient_id;
            $medical_history->diagnosis_date = is_null($request->diagnosis_date) ? $medical_history->diagnosis_date : $request->diagnosis_date;
            $medical_history->medication_name = is_null($request->medication_name) ? $medical_history->medication_name : $request->medication_name;
            $medical_history->medication_dosage = is_null($request->medication_dosage) ? $medical_history->medication_dosage : $request->medication_dosage;
            $medical_history->medication_start_date = is_null($request->medication_start_date) ? $medical_history->medication_start_date : $request->medication_start_date;
            $medical_history->medication_end_date = is_null($request->medication_end_date) ? $medical_history->medication_end_date : $request->medication_end_date;
            $medical_history->allergies = is_null($request->allergies) ? $medical_history->allergies : $request->allergies;
            $medical_history->immunisation_date = is_null($request->immunisation_date) ? $medical_history->immunisation_date : $request->immunisation_date;
            $medical_history->immunisation_vaccine = is_null($request->immunisation_vaccine) ? $medical_history->immunisation_vaccine : $request->immunisation_vaccine;
            $medical_history->lab_result = is_null($request->lab_result) ? $medical_history->lab_result : $request->lab_result;
            $medical_history->referring_doctor = is_null($request->referring_doctor) ? $medical_history->referring_doctor : $request->referring_doctor;
            $medical_history->save();
                return response()->json([
                    "message" => "Record Updated"
                ], 201);
        } else {
            return response() -> json ([
                "message" => "Record not found"
            ], 404);
        }
    }

    public function destroy($id)
    {
        if(MedicalHistory::where('id', $id)->exists()) {
            $medical_history = MedicalHistory::find($id);
            $medical_history->delete();

            return response()->json([
                "message" => "records deleted"
            ], 202);
        } else {
            return response()->json([
                "message" => "Record not found"
            ], 404);
        }
    }

}
