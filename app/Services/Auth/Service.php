<?php
namespace App\Services\Auth;

use App\Admin;
use App\Repository\AdminRepository;
use App\Repository\ResidentRepository;
use App\Resident;
use Firebase\JWT\JWT;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class Service implements Contract {
	private $admin_repo, $resident_repo;

	public function __construct(Admin $admin, Resident $resident)
	{
		$this->admin_repo = new AdminRepository($admin);
		$this->resident_repo = new ResidentRepository($resident);
	}

	public function signin($data)
	{
		if(@$data['admin_login'] === true) {
			$user = $this->admin_repo->findByUsername($data['username']);

			if($user) {
				$is_password_match = Hash::check($data['password'], $user->password);

				if($is_password_match) {
					$user['token'] = JWT::encode($user, env('APP_KEY'));

					return $user;
				} else {
					throw new \Exception('Username or password invalid', 401);
				}
			}
			throw new \Exception('Username or password invalid', 401);
		}

		$user = $this->resident_repo->findByNik($data['nik']);

		if($user) {
			$is_password_match = Hash::check($data['password'], $user->password);

			if($is_password_match) {
				$user['token'] = JWT::encode($user, env('APP_KEY'));

				return $user;
			} else {
				throw new \Exception('Nik or password invalid', 401);
			}
		}
		throw new \Exception('Nik or password invalid', 401);
	}
}
