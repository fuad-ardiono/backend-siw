<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\Auth\Contract as AuthContract;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
	private $auth_service;

	public function __construct(AuthContract $auth_service)
	{
		$this->auth_service = $auth_service;
	}

	public function signin(Request $request)
	{
		try {
			if(@$request->input('admin_login') === true) {
				$input = $request->only(['admin_login', 'username', 'password']);
				$validate = Validator::make($input, [
					'username' => 'required',
					'password' => 'required'
				]);

				if($validate->fails()) {
					return $this->response('Please check your input', $validate->getMessageBag(), 422);
				}

				$dispatch_service = $this->auth_service->signin($input);

				return $this->response('Login success', $dispatch_service);
			}

			$input = $request->only(['nik', 'password']);
			$validate = Validator::make($input, [
				'nik' => 'required',
				'password' => 'required'
			]);

			if($validate->fails()) {
				return $this->response('Please check your input', $validate->getMessageBag(), 422);
			}

			$dispatch_service = $this->auth_service->signin($input);

			return $this->response('Login success', $dispatch_service);
		} catch (\Exception $err) {
			return $this->responseError($err);
		}
	}

	public function getProfile()
	{
		try {
			$dispatch_service = $this->auth_service->getProfile();

			return $this->response('Get profile', $dispatch_service);
		} catch (\Exception $err) {
			return $this->responseError($err);
		}
	}

	public function signout(Request $request)
	{
		try {
			$input = $request->only(['admin_logout', 'resident_logout']);

			$dispatch_service = $this->auth_service->signout($input);

			return $this->response('Logout', $dispatch_service);
		} catch (\Exception $err) {
			return $this->responseError($err);
		}
	}
}
