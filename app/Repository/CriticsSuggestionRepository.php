<?php
namespace App\Repository;

use Illuminate\Database\Eloquent\Model;

class CriticsSuggestionRepository {
	private $critics_suggestion_model;

	public function __construct(Model $model)
	{
		$this->critics_suggestion_model = $model;
	}

	public function create($data)
	{
		return $this->critics_suggestion_model->newQuery()->insert($data);
	}
}
