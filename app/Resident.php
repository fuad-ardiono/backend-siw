<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Resident extends Model
{
    protected $table = 'residents';

    protected $hidden = [
    	'password'
	];

    public function head_family()
	{
		return $this->hasOne('App\HeadFamily', 'id', 'head_family_id');
	}
}
