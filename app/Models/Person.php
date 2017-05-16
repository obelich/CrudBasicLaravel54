<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    //
    protected $table = 'people';

    protected $fillable = [
    			'names',
    			'last_name',
    			'last_name',
    			'email',
    			'photo',
    			'user_id'
    	];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function telephones()
    {
        return $this->morphMany(Telephone::class, 'telephoneable');
    }

    public function addresses()
    {
        return $this->morphMany(Address::class, 'addresseable');
    }

    public function full_name()
    {
        return $this->names . ' ' . $this->last_name;
    }


}
