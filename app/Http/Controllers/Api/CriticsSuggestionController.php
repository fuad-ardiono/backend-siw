<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Services\CriticsSuggestion\Contract as CriticsSuggestionContract;

class CriticsSuggestionController extends Controller
{
	private $critics_suggestion_service;

	public function __construct(CriticsSuggestionContract $critics_suggestion_service)
	{
		$this->critics_suggestion_service = $critics_suggestion_service;
	}

	public function store(Request $request)
	{
		try {
			$input = $request->only(['subject', 'body']);

			$validate = Validator::make($input, [
				'subject' => 'required',
				'body' => 'required'
			]);

			if($validate->fails()) {
				return $this->response('Please check your input', $validate->getMessageBag());
			}

			$dispatch_service = $this->critics_suggestion_service->store($input, $request['user']['id']);

			return $this->response('Success send critics suggestion', $dispatch_service, 201);
		} catch (\Exception $err) {
			return $this->responseError($err);
		}
	}

	public function index(Request $request)
	{
		try {
			$query['perPage'] = $request->query('perPage', 5);
			$query['page'] = $request->query('page', 1);
			$query['isRead'] = $request->query('isRead', null);

			$dispatch_service = $this->critics_suggestion_service->index($query);

			return $this->response('Success get data critics suggestion', $dispatch_service);
		} catch (\Exception $err) {
			return $this->responseError($err);
		}
	}

	public function markIsRead($id)
	{
		try {
			$dispatch_service = $this->critics_suggestion_service->markIsRead($id);

			return $this->response('Success mark is read', $dispatch_service);
		} catch (\Exception $err) {
			return $this->responseError($err);
		}
	}
}
