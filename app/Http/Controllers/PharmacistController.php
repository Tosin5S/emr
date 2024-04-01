<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pharmacists;

class PharmacistController extends Controller
{
    public function index()
    {
        $pharmacist = Pharmacists::all();
        return response()->json($pharmacist);
    }

    public function store(Request $request)
    {
        $pharmacist = new Pharmacists;
        $pharmacist->name = $request->name;
        $pharmacist->sex = $request->sex;
        $pharmacist->dob = $request->dob;
        $pharmacist->address = $request->address;
        $pharmacist->phone_number = $request->phone_number;
        $pharmacist->email = $request->email;
        $pharmacist->marital_status = $request->marital_status;
        $pharmacist->state_of_origin = $request->state_of_origin;
        $pharmacist->country = $request->country;
        $pharmacist->next_of_kin_name = $request->next_of_kin_name;
        $pharmacist->next_of_kin_phone_number = $request->next_of_kin_phone_number;
        $pharmacist->save();
        return response()->json([
            "message" => "Pharmacists Added."
        ], 201);
    }

    public function show($id)
    {
        $pharmacist =Pharmacists::find($id);
        if(!empty($pharmacist))
        {
            return response()->json($pharmacist);
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
        if (Pharmacists::where('id', $id) -> exists()) {
            $pharmacist = Pharmacists::find($id);
            $pharmacist->name = is_null($request->name) ? $pharmacist->name : $request->name;
            $pharmacist->sex = is_null($request->sex) ? $pharmacist->sex : $request->sex;
            $pharmacist->dob = is_null($request->dob) ? $pharmacist->dob : $request->dob;
            $pharmacist->address = is_null($request->address) ? $pharmacist->address : $request->address;
            $pharmacist->phone_number = is_null($request->phone_number) ? $pharmacist->phone_number : $request->phone_number;
            $pharmacist->email = is_null($request->email) ? $pharmacist->email : $request->email;
            $pharmacist->marital_status = is_null($request->marital_status) ? $pharmacist->marital_status : $request->marital_status;
            $pharmacist->state_of_origin = is_null($request->state_of_origin) ? $pharmacist->state_of_origin : $request->state_of_origin;
            $pharmacist->country = is_null($request->country) ? $pharmacist->country : $request->country;
            $pharmacist->next_of_kin_name = is_null($request->next_of_kin_name) ? $pharmacist->next_of_kin_name : $request->next_of_kin_name;
            $pharmacist->next_of_kin_phone_number = is_null($request->next_of_kin_phone_number) ? $pharmacist->next_of_kin_phone_number : $request->next_of_kin_phone_number;
            $pharmacist->save();
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
        if(Pharmacists::where('id', $id)->exists()) {
            $pharmacist = Pharmacists::find($id);
            $pharmacist->delete();

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
