<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\Announcement\Contract as AnnouncementContract;
use Illuminate\Support\Facades\Validator;

class AnnouncementController extends Controller
{
	private $announcement_service;

	public function __construct(AnnouncementContract $announcement_service)
	{
		$this->announcement_service = $announcement_service;
	}

	public function store(Request $request)
	{
		try {
			$input = $request->only(['title', 'body']);

			$validate = Validator::make($input, [
				'title' => 'required',
				'body' => 'required'
			]);

			if($validate->fails()) {
				return $this->response('Please check your input', $validate->getMessageBag());
			}

			$dispatch_service = $this->announcement_service->store($input);

			return $this->response('Success create announcement', $dispatch_service);
		} catch (\Exception $err) {
			return $this->responseError($err);
		}
	}

	public function index(Request $request)
	{
		try {
			$query['perPage'] = $request->query('perPage', 5);
			$query['page'] = $request->query('page', 1);
			$query['isActive'] = $request->query('isActive', true);

			$dispatch_service = $this->announcement_service->index($query);

			return $this->response('Success get data announcement', $dispatch_service);
		} catch (\Exception $err) {
			return $this->responseError($err);
		}
	}

	public function markNotActive($id)
	{
		try {
			$dispatch_service = $this->announcement_service->markNotActive($id);

			return $this->response('Success mark active', $dispatch_service);
		} catch (\Exception $err) {
			return $this->responseError($err);
		}
	}
}
