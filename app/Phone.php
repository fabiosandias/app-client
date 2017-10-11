<?php

namespace AppClient;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Phone extends Model
{
    protected $table = 'phones';

    protected $fillable = [
        'num_phone',
        'client_id'
    ];

    public function client(){
        return $this->belongsTo('AppClient\Client');
    }

}
