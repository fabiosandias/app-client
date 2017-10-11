<?php

namespace AppClient;

use Illuminate\Database\Eloquent\Model;

class AddressEmail extends Model
{

    protected $table = 'address_emails';

    protected $fillable = [
        'email',
        'client_id'
    ];

    public function client(){
        return $this->belongsTo('AppClient\Client');
    }
}
