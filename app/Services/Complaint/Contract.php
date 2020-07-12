<?php
namespace App\Services\Complaint;

interface Contract {
	public function store($data, $id_user);
	public function index($data);
	public function markIsResolved($id_complaint);
}
