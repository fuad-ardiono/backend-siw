<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HeadFamily extends Model
{
    protected $table = 'head_family';

    public function resident()
	{
		return $this->hasMany('App\Resident', 'head_family_id', 'id');
	}
}
