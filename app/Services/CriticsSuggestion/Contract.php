<?php
namespace App\Services\CriticsSuggestion;

interface Contract {
	public function store($data, $id_user);
	public function index($data);
	public function markIsRead($cs_id);
}
