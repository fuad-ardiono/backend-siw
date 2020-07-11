<?php
namespace App\Repository;

use App\Traits\PaginatorTraits;
use Illuminate\Database\Eloquent\Model;

class CriticsSuggestionRepository {
	private $critics_suggestion_model;

	use PaginatorTraits;

	public function __construct(Model $model)
	{
		$this->critics_suggestion_model = $model;
	}

	public function create($data)
	{
		return $this->critics_suggestion_model->newQuery()->create($data);
	}

	public function markIsRead($id)
	{
		$record = $this->critics_suggestion_model->newQuery()->find($id);

		if($record) {
			$record->is_read = 1;
			$record->save();

			return $record;
		}

		throw new \Exception('No record found, please check your id');
	}

	public function index($data)
	{
		$record = $this->critics_suggestion_model->newQuery();

		if($data['isRead'] == true) {
			$record->where('is_read', true);
		} else {
			$record->where('is_read', false);
		}

		return $this->convertToMetaAndData($record->paginate($data['perPage'], '*', 'page', $data['page']));
	}
}
