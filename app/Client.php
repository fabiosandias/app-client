<?php

namespace AppClient;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{

    protected $table = 'clients';

    protected $fillable = [
        'type',
        'first_name',
        'last_name',
        'date_birth',
        'cpf',
        'legal_name',
        'responsible_name',
        'cnpj',
        'state_registration',
        'user_id',
        'excluded'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     * Returns a list of client phones
     */
    public function phones(){
        return $this->hasMany('AppClient\Phone');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     * Returns a client's address list
     */
    public function addresses(){
        return $this->hasMany('AppClient\Address');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     * Returns a customer email address list
     */
    public function addressEmails(){
        return $this->hasMany('AppClient\AddressEmail');
    }


    /**
     * @param Phone $phone
     * @return Model
     * Add a phone to client
     */
    public function addPhone(Phone $phone){
        return $this->phones()->save($phone);
    }

    /**
     * @param Address $address
     * @return Model
     * Add Address to client
     */
    public function addAddress(Address $address){
        return $this->addresses()->save($address);
    }

    /**
     * @param AddressEmail $addressEmail
     * @return Model
     * Add email address to client
     */
    public function addAddressEmail(AddressEmail $addressEmail){
        return $this->addressEmails()->save($addressEmail);
    }

    public function user(){
        return $this->belongsTo('AppClient\User');
    }
}
