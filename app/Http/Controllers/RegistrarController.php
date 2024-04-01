<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Registrars;

class RegistrarController extends Controller
{
    public function index()
    {
        $registrar = Registrars::all();
        return response()->json($registrar);
    }

    public function store(Request $request)
    {
        $registrar = new Registrars;
        $registrar->name = $request->name;
        $registrar->sex = $request->sex;
        $registrar->dob = $request->dob;
        $registrar->address = $request->address;
        $registrar->phone_number = $request->phone_number;
        $registrar->email = $request->email;
        $registrar->marital_status = $request->marital_status;
        $registrar->state_of_origin = $request->state_of_origin;
        $registrar->country = $request->country;
        $registrar->next_of_kin_name = $request->next_of_kin_name;
        $registrar->next_of_kin_phone_number = $request->next_of_kin_phone_number;
        $registrar->save();
        return response()->json([
            "message" => "Registrars Added."
        ], 201);
    }

    public function show($id)
    {
        $registrar =Registrars::find($id);
        if(!empty($registrar))
        {
            return response()->json($registrar);
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
        if (Registrars::where('id', $id) -> exists()) {
            $registrar = Registrars::find($id);
            $registrar->name = is_null($request->name) ? $registrar->name : $request->name;
            $registrar->sex = is_null($request->sex) ? $registrar->sex : $request->sex;
            $registrar->dob = is_null($request->dob) ? $registrar->dob : $request->dob;
            $registrar->address = is_null($request->address) ? $registrar->address : $request->address;
            $registrar->phone_number = is_null($request->phone_number) ? $registrar->phone_number : $request->phone_number;
            $registrar->email = is_null($request->email) ? $registrar->email : $request->email;
            $registrar->marital_status = is_null($request->marital_status) ? $registrar->marital_status : $request->marital_status;
            $registrar->state_of_origin = is_null($request->state_of_origin) ? $registrar->state_of_origin : $request->state_of_origin;
            $registrar->country = is_null($request->country) ? $registrar->country : $request->country;
            $registrar->next_of_kin_name = is_null($request->next_of_kin_name) ? $registrar->next_of_kin_name : $request->next_of_kin_name;
            $registrar->next_of_kin_phone_number = is_null($request->next_of_kin_phone_number) ? $registrar->next_of_kin_phone_number : $request->next_of_kin_phone_number;
            $registrar->save();
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
        if(Registrars::where('id', $id)->exists()) {
            $registrar = Registrars::find($id);
            $registrar->delete();

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
