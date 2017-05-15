<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    //
    protected $table = 'companies';
    protected $fillable = [
    			'name',
    			'rfc'
    	];
    public function addresses()
    {
        return $this->morphMany('App\Adress', 'Addreseable');
    }
}
