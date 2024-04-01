<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Patients;

class PatientController extends Controller
{
    public function index()
    {
        $patient = Patients::all();
        return response()->json($patient);
    }

    public function store(Request $request)
    {
        $patient = new Patients;
        $patient->name = $request->name;
        $patient->sex = $request->sex;
        $patient->dob = $request->dob;
        $patient->address = $request->address;
        $patient->phone_number = $request->phone_number;
        $patient->email = $request->email;
        $patient->matric_number = $request->matric_number;
        $patient->faculty = $request->faculty;
        $patient->department = $request->department;
        $patient->state_of_origin = $request->state_of_origin;
        $patient->country = $request->country;
        $patient->blood_group = $request->blood_group;
        $patient->genotype = $request->genotype;
        $patient->height = $request->height;
        $patient->weight = $request->weight;
        $patient->save();
        return response()->json([
            "message" => "Patients Added."
        ], 201);
    }

    public function show($id)
    {
        $patient =Patients::find($id);
        if(!empty($patient))
        {
            return response()->json($patient);
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
        if (Patients::where('id', $id) -> exists()) {
            $patient = Patients::find($id);
            $patient->name = is_null($request->name) ? $patient->name : $request->name;
            $patient->sex = is_null($request->sex) ? $patient->sex : $request->sex;
            $patient->dob = is_null($request->dob) ? $patient->dob : $request->dob;
            $patient->address = is_null($request->address) ? $patient->address : $request->address;
            $patient->phone_number = is_null($request->phone_number) ? $patient->phone_number : $request->phone_number;
            $patient->email = is_null($request->email) ? $patient->email : $request->email;
            $patient->matric_number = is_null($request->matric_number) ? $patient->matric_number : $request->matric_number;
            $patient->faculty = is_null($request->faculty) ? $patient->faculty : $request->faculty;
            $patient->department = is_null($request->department) ? $patient->department : $request->department;
            $patient->state_of_origin = is_null($request->state_of_origin) ? $patient->state_of_origin : $request->state_of_origin;
            $patient->country = is_null($request->country) ? $patient->country : $request->country;
            $patient->blood_group = is_null($request->blood_group) ? $patient->blood_group : $request->blood_group;
            $patient->genotype = is_null($request->genotype) ? $patient->genotype : $request->genotype;
            $patient->height = is_null($request->height) ? $patient->height : $request->height;
            $patient->weight = is_null($request->weight) ? $patient->weight : $request->weight;
            $patient->save();
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
        if(Patients::where('id', $id)->exists()) {
            $patient = Patients::find($id);
            $patient->delete();

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
