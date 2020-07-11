<?php
namespace App\Services\CriticsSuggestion;

use App\CriticsSuggestion;
use App\Repository\CriticsSuggestionRepository;
use Illuminate\Support\Facades\Auth;

class Service implements Contract {
	private $critics_suggestion_repo;

	public function __construct(CriticsSuggestion $criticsSuggestion)
	{
		$this->critics_suggestion_repo = new CriticsSuggestionRepository($criticsSuggestion);
	}

	public function store($data)
	{
		$data['resident_id'] = Auth::guard('resident')->user()->id;

		return $this->critics_suggestion_repo->create($data);
	}

	public function index($data)
	{
		return $this->critics_suggestion_repo->index($data);
	}

	public function markIsRead($cs_id)
	{
		return $this->critics_suggestion_repo->markIsRead($cs_id);
	}
}
