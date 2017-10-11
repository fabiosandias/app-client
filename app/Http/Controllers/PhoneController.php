<?php

namespace AppClient\Http\Controllers;

use Illuminate\Http\Request;

class PhoneController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    // create a phone
    public function create(Request $phone){
        \AppClient\Phone::create($phone->all());
        return response()->json(['status' => 'OK'], 200);
    }

    public function get($id){
//        dd($id);
        if(isset($id)){
            $phone = \AppClient\Phone::where('phone_id', $id)->get();
            if ($phone)
                return response()->json($phone, 200);
            else
                return response()->json(['message' => 'Phone not found'], 401);
        }else
            return response()->json(['message' => 'Parameter invalid'], 400);
    }

    public function delete($id){
        $client = \AppClient\Phone::where('phone_id', $id)->delete();
        if($client)
            return response()->json(['status' => 'OK'], 200);
        else
            return response()->json(['status' => 'ERROR'], 400);
    }


    public function update(Request $request, $id){
        $client = \AppClient\Phone::where('phone_id', $id)->update(['num_phone' => $request->num_phone]);;
        return response()->json(['status' => 'OK'], 200);
    }
}


