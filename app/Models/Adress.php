<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Adress extends Model
{
    //
    protected $table = 'addresses';
    protected $fillable = [
    			'colony',
    			'num_int',
    			'num_ext',
    			'addresseable_type',
    			'addresseable_id'
    	];
    public function adresseable()
    {
        return $this->morphTo();
    }
}
