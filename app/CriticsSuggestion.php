<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CriticsSuggestion extends Model
{
	protected $table = 'critics_suggestion';

	protected $fillable = [
		'subject',
		'body',
		'resident_id'
	];

	public function resident()
	{
		return $this->hasOne('App\Resident', 'id', 'resident_id');
	}
}
