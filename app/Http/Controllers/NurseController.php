<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Nurses;

class NurseController extends Controller
{
    public function index()
    {
        $nurse = Nurses::all();
        return response()->json($nurse);
    }

    public function store(Request $request)
    {
        $nurse = new Nurses;
        $nurse->name = $request->name;
        $nurse->sex = $request->sex;
        $nurse->dob = $request->dob;
        $nurse->address = $request->address;
        $nurse->phone_number = $request->phone_number;
        $nurse->email = $request->email;
        $nurse->license_number = $request->license_number;
        $nurse->marital_status = $request->marital_status;
        $nurse->state_of_origin = $request->state_of_origin;
        $nurse->country = $request->country;
        $nurse->next_of_kin_name = $request->next_of_kin_name;
        $nurse->next_of_kin_phone_number = $request->next_of_kin_phone_number;
        $nurse->save();
        return response()->json([
            "message" => "Nurses Added."
        ], 201);
    }

    public function show($id)
    {
        $nurse =Nurses::find($id);
        if(!empty($nurse))
        {
            return response()->json($nurse);
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
        if (Nurses::where('id', $id) -> exists()) {
            $nurse = Nurses::find($id);
            $nurse->name = is_null($request->name) ? $nurse->name : $request->name;
            $nurse->sex = is_null($request->sex) ? $nurse->sex : $request->sex;
            $nurse->dob = is_null($request->dob) ? $nurse->dob : $request->dob;
            $nurse->address = is_null($request->address) ? $nurse->address : $request->address;
            $nurse->phone_number = is_null($request->phone_number) ? $nurse->phone_number : $request->phone_number;
            $nurse->email = is_null($request->email) ? $nurse->email : $request->email;
            $nurse->license_number = is_null($request->license_number) ? $nurse->license_number : $request->license_number;
            $nurse->marital_status = is_null($request->marital_status) ? $nurse->marital_status : $request->marital_status;
            $nurse->state_of_origin = is_null($request->state_of_origin) ? $nurse->state_of_origin : $request->state_of_origin;
            $nurse->country = is_null($request->country) ? $nurse->country : $request->country;
            $nurse->next_of_kin_name = is_null($request->next_of_kin_name) ? $nurse->next_of_kin_name : $request->next_of_kin_name;
            $nurse->next_of_kin_phone_number = is_null($request->next_of_kin_phone_number) ? $nurse->next_of_kin_phone_number : $request->next_of_kin_phone_number;
            $nurse->save();
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
        if(Nurses::where('id', $id)->exists()) {
            $nurse = Nurses::find($id);
            $nurse->delete();

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
