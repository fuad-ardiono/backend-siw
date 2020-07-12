<?php
namespace App\Services\Announcement;

interface Contract {
	public function store($data, $id_user);
	public function index($data);
	public function markNotActive($id_announcement);
}
