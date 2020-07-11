<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Services\Complaint\Contract as ComplaintContract;

class ComplaintController extends Controller
{
	private $complaint_service;

	public function __construct(ComplaintContract $complaint_service)
	{
		$this->complaint_service = $complaint_service;
	}

	public function store(Request $request)
	{
		try {
			$input = $request->only(['type', 'body']);

			$validate = Validator::make($input, [
				'type' => 'required|in:kematian,kehilangan,tamu',
				'body' => 'required'
			]);

			if($validate->fails()) {
				return $this->response('Please check your input', $validate->getMessageBag());
			}

			$dispatch_service = $this->complaint_service->store($input);

			return $this->response('Success create complaint', $dispatch_service, 201);
		} catch (\Exception $err) {
			return $this->responseError($err);
		}
	}

	public function index(Request $request)
	{
		try {
			$query['perPage'] = $request->query('perPage', 5);
			$query['page'] = $request->query('page', 1);
			$query['isResolved'] = $request->query('isResolved', false);

			$dispatch_service = $this->complaint_service->index($query);

			return $this->response('Success get data complaint', $dispatch_service);
		} catch (\Exception $err) {
			return $this->responseError($err);
		}
	}

	public function markIsResolved($id)
	{
		try {
			$dispatch_service = $this->complaint_service->markIsResolved($id);

			return $this->response('Success mark is resolved', $dispatch_service);
		} catch (\Exception $err) {
			return $this->responseError($err);
		}
	}
}
