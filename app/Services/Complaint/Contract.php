<?php
namespace App\Services\Complaint;

interface Contract {
	public function store($data);
	public function index($data);
	public function markIsResolved($id_complaint);
}
