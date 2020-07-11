<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Complaint extends Model
{
    protected $table = 'complaint';

    protected $fillable = [
    	'type',
		'body',
		'resident_id'
	];

	public function resident()
	{
		return $this->hasOne('App\Resident', 'id', 'resident_id');
	}
}
