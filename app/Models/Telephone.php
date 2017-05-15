<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Telephone extends Model
{
    //
    protected $table = 'telephones';
    protected $fillable = [
    			'type',
    			'number',
    			'telephoneable_type',
    			'telephoneable_id'
    	];

    public function telephonable()
    {
        return $this->morphTo();
    }
}
