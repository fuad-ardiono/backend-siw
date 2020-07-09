<?php
namespace App\Repository;

use Illuminate\Database\Eloquent\Model;

class PackagePriceRepository
{
	private $package_price;

	public function __construct(Model $model)
	{
		$this->package_price = $model;
	}
}
