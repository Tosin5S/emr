<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Registration;

class RegistrationController extends Controller
{
    public function index()
    {
        $registration = Registration::all();
        return response()->json($registration);
    }

    public function store(Request $request)
    {
        $registration = new Registration;
        $registration->registration_date = $request->registration_date;
        $registration->registrar_id = $request->registrar_id;
        $registration->patient_id = $request->patient_id;
        $registration->save();
        return response()->json([
            "message" => "Registration Added."
        ], 201);
    }

    public function show($id)
    {
        $registration =Registration::find($id);
        if(!empty($registration))
        {
            return response()->json($registration);
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
        if (Registration::where('id', $id) -> exists()) {
            $registration = Registration::find($id);
            $registration->registration_date = is_null($request->registration_date) ? $registration->registration_date : $request->registration_date;
            $registration->registrar_id = is_null($request->registrar_id) ? $registration->registrar_id : $request->registrar_id;
            $registration->patient_id = is_null($request->patient_id) ? $registration->patient_id : $request->patient_id;
            $registration->save();
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
        if(Registration::where('id', $id)->exists()) {
            $registration = Registration::find($id);
            $registration->delete();

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
