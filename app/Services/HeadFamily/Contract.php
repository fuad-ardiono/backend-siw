<?php
namespace App\Services\HeadFamily;

interface Contract {
	public function create($data);
	public function update($data);
	public function delete($id);
	public function index($data);
	public function show($id);
}
