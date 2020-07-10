<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Services\CriticsSuggestion\Contract as CriticsSuggestionContract;

class CirticsSuggestionController extends Controller
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

			$dispatch_service = $this->critics_suggestion_service->store($input);

			return $this->response('Success send critics suggestion', $dispatch_service, 201);
		} catch (\Exception $err) {
			return $this->responseError($err);
		}
	}
}
