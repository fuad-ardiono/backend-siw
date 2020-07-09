<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function response($message, $data, $status=200)
	{
		return response([
			'message' => $message,
			'data' => $data
		], $status);
	}

	public function responseError($exception, $status=403)
	{
		return response([
			'message' => 'Oops, something happened on our api',
			'error_message' => $exception->getMessage(),
			'trace' => $exception->getTraceAsString()
		], $status);
	}
}
