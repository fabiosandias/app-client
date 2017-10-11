<?php

namespace AppClient\Http\Controllers;

use Illuminate\Http\Request;

class AddressController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    // create a phone
    public function create(Request $address){
        \AppClient\Address::create($address->all());
        return response()->json(['status' => 'OK'], 200);
    }

    public function get($id){
        if(isset($id)){
            $phone = \AppClient\Address::where('address_id', $id)->get();
            if ($phone)
                return response()->json($phone, 200);
            else
                return response()->json(['message' => 'Email not found'], 401);
        }else
            return response()->json(['message' => 'Parameter invalid'], 400);
    }

    public function delete($id){
        $client = \AppClient\Address::where('address_id', $id)->delete();
        if($client)
            return response()->json(['status' => 'OK'], 200);
        else
            return response()->json(['status' => 'ERROR'], 400);
    }


    public function update(Request $request, $id){
        \AppClient\Address::where('address_id', $id)->update([
            'street' => $request->street,
            'number' => $request->number,
            'complement' => $request->complement,
            'city' => $request->city,
            'state' => $request->state,
            'zip_code' => $request->zip_code,
            'district' => $request->district,
        ]);;
        return response()->json(['status' => 'OK'], 200);
    }
}
