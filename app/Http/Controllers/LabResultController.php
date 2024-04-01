<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\LabResult;

class LabResultController extends Controller
{
    public function index()
    {
        $lab_result = LabResult::all();
        return response()->json($lab_result);
    }

    public function store(Request $request)
    {
        $lab_result = new LabResult;
        $lab_result->prescription_name = $request->prescription_name;
        $lab_result->prescription_dosage = $request->prescription_dosage;
        $lab_result->start_date = $request->start_date;
        $lab_result->doctor_id = $request->end_date;
        $lab_result->lab_tech_id = $request->lab_tech_id;
        $lab_result->save();
        return response()->json([
            "message" => "LabResult Added."
        ], 201);
    }

    public function show($id)
    {
        $lab_result =LabResult::find($id);
        if(!empty($lab_result))
        {
            return response()->json($lab_result);
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
        if (LabResult::where('id', $id) -> exists()) {
            $lab_result = LabResult::find($id);
            $lab_result->result = is_null($request->result) ? $lab_result->result : $request->result;
            $lab_result->date_released = is_null($request->date_released) ? $lab_result->date_released : $request->date_released;
            $lab_result->patient_id = is_null($request->patient_id) ? $lab_result->patient_id : $request->patient_id;
            $lab_result->doctor_id = is_null($request->doctor_id) ? $lab_result->doctor_id : $request->doctor_id;
            $lab_result->lab_tech_id = is_null($request->lab_tech_id) ? $lab_result->lab_tech_id : $request->lab_tech_id;
            $lab_result->save();
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
        if(LabResult::where('id', $id)->exists()) {
            $lab_result = LabResult::find($id);
            $lab_result->delete();

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
