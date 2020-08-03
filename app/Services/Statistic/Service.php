<?php
namespace App\Services\Statistic;

use App\Repository\ResidentRepository;
use App\Resident;

class Service implements Contract {
	private $resident_repo;

	public function __construct(Resident $resident_model)
	{
		$this->resident_repo = new ResidentRepository($resident_model);
	}

	public function residentMaleCount()
	{
		return $this->resident_repo->residentMaleCount();
	}

	public function residentFemaleCount()
	{
		return $this->resident_repo->residentFemaleCount();
	}
}
