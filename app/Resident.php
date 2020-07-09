<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Resident extends Authenticatable
{
	use Notifiable;
    protected $table = 'residents';

    protected $hidden = [
    	'password'
	];

    public function head_family()
	{
		return $this->hasOne('App\HeadFamily', 'id', 'head_family_id');
	}

	public function role()
	{
		return $this->hasOne('App\Role', 'id', 'role_id');
	}
}
