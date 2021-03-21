<?php
namespace App\Services\Movie;

interface Contract {
	public function create($data);
	public function update($id, $data);
	public function delete($id);
}
