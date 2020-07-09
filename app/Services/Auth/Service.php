<?php
namespace App\Services\Auth;
use App\Admin;
use App\Repository\AdminRepository;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class Service implements Contract {
	private $admin_repo;

	public function __construct(Admin $admin)
	{
		$this->admin_repo = new AdminRepository($admin);
	}

	public function signin($data)
	{
		if(@$data['admin_login'] === true) {
			$user = $this->admin_repo->findByUsername($data['username']);

			if($user) {
				$is_password_match = Hash::check($data['password'], $user->password);

				if($is_password_match) {

					if(!Auth::guard('admin')->check()) {
						Auth::guard('admin')->attempt(['username' => $data['username'], 'password' => $data['password']]);

						return $user;
					}

					throw new \Exception('You already signed in', 401);
				} else {
					throw new \Exception('Username or password invalid', 401);
				}
			}
			throw new \Exception('Username or password invalid', 401);
		}
	}

	public function signout($data)
	{
		if(@$data['admin_logout'] === true) {
			Auth::guard('admin')->logout();

			return true;
		}

		if(@$data['resident_logout'] === true) {
			Auth::guard('resident')->logout();

			return true;
		}

		throw new \Exception('Invalid payload value', 403);
	}

	public function getProfile()
	{
		$admin = Auth::guard('admin')->user();

		if($admin) {
			return $this->admin_repo->findByUsername($admin['username']);
		}
	}
}
