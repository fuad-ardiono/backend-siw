<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\Package\Contract as PackageService;

class PackageController extends Controller
{
	private $package_service;

	public function __construct(PackageService $package_service)
	{
		$this->package_service = $package_service;
	}

	public function listData() {
		try {
			$dispatch_service = $this->package_service->listData();
			return $this->response('Success fetch list data', $dispatch_service);
		} catch (\Exception $err) {
			return $this->responseError($err);
		}
	}
}
