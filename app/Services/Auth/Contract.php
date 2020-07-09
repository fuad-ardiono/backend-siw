<?php
namespace App\Services\Auth;

interface Contract {
	public function signin($data);
	public function signout($data);
	public function getProfile();
}
