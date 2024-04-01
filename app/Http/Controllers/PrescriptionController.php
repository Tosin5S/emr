<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Prescription;

class PrescriptionController extends Controller
{
    public function index()
    {
        $prescription = Prescription::all();
        return response()->json($prescription);
    }

    public function store(Request $request)
    {
        $prescription = new Prescription;
        $prescription->prescription_name = $request->prescription_name;
        $prescription->prescription_dosage = $request->prescription_dosage;
        $prescription->start_date = $request->start_date;
        $prescription->end_date = $request->end_date;
        $prescription->patient_id = $request->patient_id;
        $prescription->doctor_id = $request->doctor_id;
        $prescription->save();
        return response()->json([
            "message" => "Prescription Added."
        ], 201);
    }

    public function show($id)
    {
        $prescription =Prescription::find($id);
        if(!empty($prescription))
        {
            return response()->json($prescription);
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
        if (Prescription::where('id', $id) -> exists()) {
            $prescription = Prescription::find($id);
            $prescription->prescription_name = is_null($request->prescription_name) ? $prescription->prescription_name : $request->prescription_name;
            $prescription->prescription_dosage = is_null($request->prescription_dosage) ? $prescription->prescription_dosage : $request->prescription_dosage;
            $prescription->start_date = is_null($request->start_date) ? $prescription->start_date : $request->start_date;
            $prescription->end_date = is_null($request->end_date) ? $prescription->end_date : $request->end_date;
            $prescription->patient_id = is_null($request->patient_id) ? $prescription->patient_id : $request->patient_id;
            $prescription->doctor_id = is_null($request->doctor_id) ? $prescription->doctor_id : $request->doctor_id;
            $prescription->save();
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
        if(Prescription::where('id', $id)->exists()) {
            $prescription = Prescription::find($id);
            $prescription->delete();

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
