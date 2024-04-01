<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Doctors;

class DoctorController extends Controller
{
    public function index()
    {
        $doctor = Doctors::all();
        return response()->json($doctor);
    }

    public function store(Request $request)
    {
        $doctor = new Doctors;
        $doctor->name = $request->name;
        $doctor->sex = $request->sex;
        $doctor->dob = $request->dob;
        $doctor->address = $request->address;
        $doctor->phone_number = $request->phone_number;
        $doctor->email = $request->email;
        $doctor->department = $request->department;
        $doctor->marital_status = $request->marital_status;
        $doctor->state_of_origin = $request->state_of_origin;
        $doctor->country = $request->country;
        $doctor->next_of_kin_name = $request->next_of_kin_name;
        $doctor->next_of_kin_phone_number = $request->next_of_kin_phone_number;
        $doctor->save();
        return response()->json([
            "message" => "Doctors Added."
        ], 201);
    }

    public function show($id)
    {
        $doctor =Doctors::find($id);
        if(!empty($doctor))
        {
            return response()->json($doctor);
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
        if (Doctors::where('id', $id) -> exists()) {
            $doctor = Doctors::find($id);
            $doctor->name = is_null($request->name) ? $doctor->name : $request->name;
            $doctor->sex = is_null($request->sex) ? $doctor->sex : $request->sex;
            $doctor->dob = is_null($request->dob) ? $doctor->dob : $request->dob;
            $doctor->address = is_null($request->address) ? $doctor->address : $request->address;
            $doctor->phone_number = is_null($request->phone_number) ? $doctor->phone_number : $request->phone_number;
            $doctor->email = is_null($request->email) ? $doctor->email : $request->email;
            $doctor->department = is_null($request->department) ? $doctor->department : $request->department;
            $doctor->marital_status = is_null($request->marital_status) ? $doctor->marital_status : $request->marital_status;
            $doctor->state_of_origin = is_null($request->state_of_origin) ? $doctor->state_of_origin : $request->state_of_origin;
            $doctor->country = is_null($request->country) ? $doctor->country : $request->country;
            $doctor->next_of_kin_name = is_null($request->next_of_kin_name) ? $doctor->next_of_kin_name : $request->next_of_kin_name;
            $doctor->next_of_kin_phone_number = is_null($request->next_of_kin_phone_number) ? $doctor->next_of_kin_phone_number : $request->next_of_kin_phone_number;
            $doctor->save();
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
        if(Doctors::where('id', $id)->exists()) {
            $doctor = Doctors::find($id);
            $doctor->delete();

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
