<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\EMR;

class EmrController extends Controller
{
    public function index()
    {
        $emr = EMR::all();
        return response()->json($emr);
    }

    public function store(Request $request)
    {
        $emr = new EMR;
        $emr->name = $request->name;
        $emr->position = $request->position;
        $emr->save();
        return response()->json([
            "message" => "Emr Added."
        ], 201);
    }

    public function show($id)
    {
        $emr =EMR::find($id);
        if(!empty($emr))
        {
            return response()->json($emr);
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
        if (EMR::where('id', $id) -> exists()) {
            $emr = EMR::find($id);
            $emr->name = is_null(request->name) ? $book->name : $request->name;
            $emr->position = is_null($request->position) ? $emr->position : $request->position;
            $emr->save();
                return response()->json([
                    "message" => "Record Updated"
                ], 404);
        } else {
            return response() -> json ([
                "message" => "Record not found"
            ], 404);
        }
    }

    public function destroy($id)
    {
        if(EMR::where('id', $id)->exists()) {
            $emr = EMR::find($id);
            $emr->delete();

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
