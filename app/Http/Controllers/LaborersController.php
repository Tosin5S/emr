<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Laborers;

class LaborersController extends Controller
{
    public function index()
    {
        $laborer = Laborers::all();
        return response()->json($laborer);
    }

    public function store(Request $request)
    {
        $laborer = new Laborers;
        $laborer->test_type = $request->test_type;
        $laborer->specimen = $request->specimen;
        $laborer->date_ordered = $request->date_ordered;
        $laborer->patient_id = $request->patient_id;
        $laborer->doctor_id = $request->doctor_id;
        $laborer->lab_tech_id = $request->lab_tech_id;
        $laborer->save();
        return response()->json([
            "message" => "Laborers Added."
        ], 201);
    }

    public function show($id)
    {
        $laborer =Laborers::find($id);
        if(!empty($laborer))
        {
            return response()->json($laborer);
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
        if (Laborers::where('id', $id) -> exists()) {
            $laborer = Laborers::find($id);
            $laborer->test_type = is_null($request->test_type) ? $laborer->test_type : $request->test_type;
            $laborer->specimen = is_null($request->specimen) ? $laborer->specimen : $request->specimen;
            $laborer->date_ordered = is_null($request->date_ordered) ? $laborer->date_ordered : $request->date_ordered;
            $laborer->patient_id = is_null($request->patient_id) ? $laborer->patient_id : $request->patient_id;
            $laborer->doctor_id = is_null($request->doctor_id) ? $laborer->doctor_id : $request->doctor_id;
            $laborer->lab_tech_id = is_null($request->lab_tech_id) ? $laborer->lab_tech_id : $request->lab_tech_id;
            $laborer->save();
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
        if(Laborers::where('id', $id)->exists()) {
            $laborer = Laborers::find($id);
            $laborer->delete();

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
