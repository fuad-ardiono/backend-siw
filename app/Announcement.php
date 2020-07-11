<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Announcement extends Model
{
    protected $table = 'announcement';

    protected $fillable = [
    	'title',
		'body',
		'admin_id'
	];

    public function admin()
	{
		return $this->hasOne('App\Admin', 'id', 'admin_id');
	}
}
