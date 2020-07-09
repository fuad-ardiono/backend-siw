<?php
namespace App\Repository;

use Illuminate\Database\Eloquent\Model;

class PackageRepository
{
	private $package;

	public function __construct(Model $model)
	{
		$this->package = $model;
	}

	public function findByName($name)
	{
		return $this->package->newQuery()->where('name', 'like', '%'.$name.'%')
			->with('price')
			->get();
	}

	public function findOneByName($name)
	{
		return $this->package->newQuery()->where('name', $name)
			->with('price')
			->first();
	}

	public function findAll()
	{
		return $this->package->newQuery()->with('price')->get();
	}
}
