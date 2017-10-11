<?php

namespace AppClient\Http\Controllers;

use Illuminate\Auth\Access\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;

class ClientController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        redirect('');
    }

    public function person()
    {
        $clients = \AppClient\Client::where('type', 'Person')->paginate(10);

//        var_dump(Auth::user()->id); die();

        return view('client.index', compact('clients'));
    }

    public function company()
    {
        $clients = \AppClient\Client::where('type', 'Company')->paginate(10);

        return view('client.company', compact('clients'));
    }

    public function save(Request $client)
    {
        // Endereço
        $streets = Input::get('street');
        $numbers = Input::get('number');
        $citys = Input::get('city');
        $complements = Input::get('complement');
        $districts = Input::get('district');
        $states = Input::get('state');
        $zip_codes = Input::get('zip_code');

//        dd($client->type);
        $data_client = [];
        if($client->type == "Person"){
            $data_client = [
              'type' => $client->type,
              'first_name' => $client->first_name,
              'last_name' => $client->last_name,
              'cpf' => $client->cpf,
              'date_birth' => $client->date_birth,
            ];
        }

        if($client->type == "Person"){
            $data_client = [
                'type' => $client->type,
                'first_name' => $client->first_name,
                'last_name' => $client->last_name,
                'cpf' => $client->cpf,
                'date_birth' => $client->date_birth,
                'user_id' => $client->user_id,
            ];
        }
        if($client->type == 'Company'){
            $data_client = [
                'type' => $client->type,
                'legal_name' => $client->legal_name,
                'cnpj' => $client->cnpj,
                'state_registration' => $client->state_registration,
                'responsible_name' => $client->responsible_name,
                'user_id' => $client->user_id,
            ];
        }

        $client_id = \AppClient\Client::create($data_client);


//        var_dump(empty($streets));
//        var_dump($client_id);
//        var_dump($streets); die;
        if ($streets[0] != "")
            foreach ($streets as $key => $street) {
                $address['street'] = $street;
                $address['number'] = $numbers[$key];
                $address['city'] = $citys[$key];
                $address['complement'] = $complements[$key];
                $address['district'] = $districts[$key];
                $address['state'] = $states[$key];
                $address['zip_code'] = $zip_codes[$key];
                $address['client_id'] = $client_id->id;
                \AppClient\Address::create($address);
            }

        $phones = Input::get('num_phone');
//        var_dump($phones); die;
        if ($phones[0] != "")
            foreach ($phones as $key => $phone) {
                $data_phone['num_phone'] = $phone;
                $data_phone['client_id'] = $client_id->id;
                \AppClient\Phone::create($data_phone);
            }

        $emails = Input::get('email');

        if ($emails[0] != "")
            foreach ($emails as $key => $email) {
                $data_phone['email'] = $email;
                $data_phone['client_id'] = $client_id->id;
                \AppClient\AddressEmail::create($data_phone);
            }


        return response()->json([
            'status' => 'OK',
            'message' => 'Client created with successful'
        ], 201);
    }




    public function add_person()
    {
        return view('client.create');
    }


    public function detail($id){
        $client = \AppClient\Client::find($id);
        return view('client.detail', compact('client'));

    }

    public function get_id($id){

        if(isset($id)){
            $client = \AppClient\Client::find($id);
            if ($client)
                return response()->json($client, 200);
            else
                return response()->json(['message' => 'User not found'], 401);
        }else
            return response()->json(['message' => 'Parameter invalid'], 400);



    }

    public function update(Request $request, $id){
//        \AppClient\Client::find($id)->$this->update($client->all());
        $client = \AppClient\Client::findOrFail($id);
        $client->fill($request->all());
        $client->save();
        return response()->json(['status' => 'OK'], 200);
    }

    public function delete($id){
//        \AppClient\Client::find($id)->$this->update($client->all());
        $client = \AppClient\Client::find($id);
        $client->delete();
        return response()->json(['status' => 'OK'], 200);
    }




}
