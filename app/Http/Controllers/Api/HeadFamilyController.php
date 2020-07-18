<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Services\HeadFamily\Contract as ResidentContract;

class HeadFamilyController extends Controller
{
    private $resident_service;

    public function __construct(ResidentContract $resident_service)
	{
		$this->resident_service = $resident_service;
	}

	public function store(Request $request)
	{
		try {
			$input = $request->only(['head_family', 'resident']);

			$validate = Validator::make($input, [
				'head_family' => 'required|array',
				'resident' => 'required|array'
			]);

			if($validate->fails()) {
				return $this->response('Please check your input', $validate->getMessageBag());
			}

			$dispatch_service = $this->resident_service->create($input);

			return $this->response('Success create resident', $dispatch_service);
		} catch (\Exception $err) {
			return $this->responseError($err);
		}
	}

	public function update(Request $request)
	{
		try {
			$input = $request->only(['head_resident', 'resident']);

			$validate = Validator::make($input, [
				'head_resident' => 'required|array',
				'resident' => 'required|array'
			]);

			if($validate->fails()) {
				return $this->response('Please check your input', $validate->getMessageBag());
			}

			$dispatch_service = $this->resident_service->update($input);

			return $this->response('Success update resident', $dispatch_service);
		} catch (\Exception $err) {
			return $this->responseError($err);
		}
	}

	public function index(Request $request)
	{
		try {
			$query['perPage'] = $request->query('perPage', 5);
			$query['page'] = $request->query('page', 1);
			$query['isRead'] = $request->query('isRead', false);

			$dispatch_service = $this->resident_service->index($query);

			return $this->response('Success get data resident', $dispatch_service);
		} catch (\Exception $err) {
			return $this->responseError($err);
		}
	}
}
