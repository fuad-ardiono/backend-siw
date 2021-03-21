<?php
namespace App\Repository;

use App\Traits\PaginatorTraits;
use Illuminate\Database\Eloquent\Model;

class MovieRepository {
	private Model $movie_model;

	use PaginatorTraits;

	public function __construct(Model $model)
	{
		$this->movie_model = $model;
	}

	public function store($data)
	{
		return $this->movie_model->newQuery()->create($data);
	}

	public function update($id, $data)
	{
		$record = $this->movie_model->newQuery()->findOrFail($id);
		$record->update($data);

		return $record;
	}

	public function delete($id)
	{
		$record = $this->movie_model->newQuery()->findOrFail($id);

		$record->delete();

		return $record;
	}
}
