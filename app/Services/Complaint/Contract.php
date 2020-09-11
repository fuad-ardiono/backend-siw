<?php
namespace App\Services\Complaint;

interface Contract {
	public function store($data, $id_user);
	public function index($data);
	public function marklIsRead($id_complaint);
	public function marklIsPending($id_complaint);
	public function marklIsAcc($id_complaint);
}
