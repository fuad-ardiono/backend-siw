<?php
namespace App\Repository;

use App\Traits\PaginatorTraits;
use Illuminate\Database\Eloquent\Model;

class HeadFamilyRepository {
	private $head_family_model;

	use PaginatorTraits;

	public function __construct(Model $model)
	{
		$this->head_family_model = $model;
	}

	public function create($data)
	{
		return $this->head_family_model->newQuery()->create($data);
	}

	public function update($data)
	{
		return $this->head_family_model->newQuery()->find($data['id'])->update($data);
	}

	public function index($data)
	{
		$record = $this->head_family_model->newQuery();

		$pagination = $this->convertToMetaAndData($record->with('resident')
			->paginate($data['perPage'], '*', 'page', $data['page']));

		$record_restructure = array_map(function ($data) {
			$resident = $data['resident'];
			unset($data['resident']);
			$head_family = $data;

			return [
				'head_family' => $head_family,
				'resident' => $resident
			];
		}, $pagination['record']);

		$pagination['record'] = $record_restructure;

		return $pagination;
	}
}
