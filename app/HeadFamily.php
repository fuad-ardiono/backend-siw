<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HeadFamily extends Model
{
    protected $table = 'head_family';

    protected $fillable = [
		'head_family_nik',
		'name',
		'address',
		'postal_code',
		'kelurahan',
		'kecamatan',
		'city',
		'province'
	];

    public function resident()
	{
		return $this->hasMany('App\Resident', 'head_family_id', 'id');
	}
}
