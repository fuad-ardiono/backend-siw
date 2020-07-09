<?php
namespace App\Repository;

use Illuminate\Database\Eloquent\Model;

class AdminRepository {
	private $admin_model;

	public function __construct(Model $model)
	{
		$this->admin_model = $model;
	}

	public function findByUsername($username)
	{
		return $this->admin_model->newQuery()->with('role')->where('username', $username)->first();
	}
}
