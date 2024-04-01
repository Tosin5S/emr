<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\LaboratoryTechnician;

class LaboratoryTechnicianController extends Controller
{
    public function index()
    {
        $lab_tech = LaboratoryTechnician::all();
        return response()->json($lab_tech);
    }

    public function store(Request $request)
    {
        $lab_tech = new LaboratoryTechnician;
        $lab_tech->name = is_null($request->name) ? $lab_tech->name : $request->name;
        $lab_tech->sex = is_null($request->sex) ? $lab_tech->sex : $request->sex;
        $lab_tech->dob = is_null($request->dob) ? $lab_tech->dob : $request->dob;
        $lab_tech->address = is_null($request->address) ? $lab_tech->address : $request->address;
        $lab_tech->phone_number = is_null($request->phone_number) ? $lab_tech->phone_number : $request->phone_number;
        $lab_tech->email = is_null($request->email) ? $lab_tech->email : $request->email;
        $lab_tech->department = is_null($request->department) ? $lab_tech->department : $request->department;
        $lab_tech->marital_status = is_null($request->marital_status) ? $lab_tech->marital_status : $request->marital_status;
        $lab_tech->state_of_origin = is_null($request->state_of_origin) ? $lab_tech->state_of_origin : $request->state_of_origin;
        $lab_tech->country = is_null($request->country) ? $lab_tech->country : $request->country;
        $lab_tech->next_of_kin_name = is_null($request->next_of_kin_name) ? $lab_tech->next_of_kin_name : $request->next_of_kin_name;
        $lab_tech->next_of_kin_phone_number = is_null($request->next_of_kin_phone_number) ? $lab_tech->next_of_kin_phone_number : $request->next_of_kin_phone_number;
        $lab_tech->save();
        return response()->json([
            "message" => "LaboratoryTechnician Added."
        ], 201);
    }

    public function show($id)
    {
        $lab_tech =LaboratoryTechnician::find($id);
        if(!empty($lab_tech))
        {
            return response()->json($lab_tech);
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
        if (LaboratoryTechnician::where('id', $id) -> exists()) {
            $lab_tech = LaboratoryTechnician::find($id);
            $lab_tech->name = is_null($request->name) ? $book->name : $request->name;
            $lab_tech->position = is_null($request->position) ? $lab_tech->position : $request->position;
            $lab_tech->save();
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
        if(LaboratoryTechnician::where('id', $id)->exists()) {
            $lab_tech = LaboratoryTechnician::find($id);
            $lab_tech->delete();

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
