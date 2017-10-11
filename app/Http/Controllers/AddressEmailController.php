<?php

namespace AppClient\Http\Controllers;

use Illuminate\Http\Request;

class AddressEmailController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    // create a phone
    public function create(Request $email){
        \AppClient\AddressEmail::create($email->all());
        return response()->json(['status' => 'OK'], 200);
    }

    public function get($id){
        if(isset($id)){
            $phone = \AppClient\AddressEmail::where('address_email_id', $id)->get();
            if ($phone)
                return response()->json($phone, 200);
            else
                return response()->json(['message' => 'Email not found'], 401);
        }else
            return response()->json(['message' => 'Parameter invalid'], 400);
    }

    public function delete($id){
        $client = \AppClient\AddressEmail::where('address_email_id', $id)->delete();
        if($client)
            return response()->json(['status' => 'OK'], 200);
        else
            return response()->json(['status' => 'ERROR'], 400);
    }


    public function update(Request $request, $id){
        \AppClient\AddressEmail::where('address_email_id', $id)->update(['email' => $request->email]);;
        return response()->json(['status' => 'OK'], 200);
    }
}
