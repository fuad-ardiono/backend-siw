<?php
namespace App\Repository;

use Illuminate\Database\Eloquent\Model;

class ResidentRepository {
	private $resident_model;

	public function __construct(Model $model)
	{
		$this->resident_model = $model;
	}

	public function findByNik($nik)
	{
		return $this->resident_model->newQuery()->where('nik_id', $nik)
			->with(['role', 'head_family'])->first();
	}
}
