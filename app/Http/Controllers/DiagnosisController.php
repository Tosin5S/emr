<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Diagnosis;

class DiagnosisController extends Controller
{
    public function index()
    {
        $diagnosis = Diagnosis::all();
        return response()->json($diagnosis);
    }

    public function store(Request $request)
    {
        $diagnosis = new Diagnosis;
        $diagnosis->doctor_id = $request->doctor_id;
        $diagnosis->patient_id = $request->patient_id;
        $diagnosis->date_diagnosised = $request->date_diagnosised;
        $diagnosis->save();
        return response()->json([
            "message" => "Diagnosis Added."
        ], 201);
    }

    public function show($id)
    {
        $diagnosis =Diagnosis::find($id);
        if(!empty($diagnosis))
        {
            return response()->json($diagnosis);
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
        if (Diagnosis::where('id', $id) -> exists()) {
            $diagnosis = Diagnosis::find($id);
            $diagnosis->doctor_id = is_null($request->doctor_id) ? $diagnosis->doctor_id : $request->doctor_id;
            $diagnosis->patient_id = is_null($request->patient_id) ? $diagnosis->patient_id : $request->patient_id;
            $diagnosis->date_diagnosised = is_null($request->date_diagnosised) ? $diagnosis->date_diagnosised : $request->date_diagnosised;
            $diagnosis->save();
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
        if(Diagnosis::where('id', $id)->exists()) {
            $diagnosis = Diagnosis::find($id);
            $diagnosis->delete();

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
