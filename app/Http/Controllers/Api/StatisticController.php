<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\Statistic\Contract as StatisticService;

class StatisticController extends Controller
{
	private $statisticService;

	public function __construct(StatisticService $statisticService)
	{
		$this->statisticService = $statisticService;
	}

	public function index()
	{
		return $this->response('Success get statistic data', [
			'resident_male_count' => $this->statisticService->residentMaleCount(),
			'resident_female_count' => $this->statisticService->residentFemaleCount()
		]);
	}
}
