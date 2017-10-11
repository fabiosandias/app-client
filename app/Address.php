<?php

namespace AppClient;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{

    protected $table = 'addresses';

    protected $fillable = [
        'street',
        'number',
        'state',
        'district',
        'city',
        'complement',
        'client_id'
    ];

    public function client(){
        return $this->belongsTo('AppClient\Client');
    }
}
