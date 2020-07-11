<?php
namespace App\Repository;

use App\Traits\PaginatorTraits;
use Illuminate\Database\Eloquent\Model;

class AnnouncementRepository {
	private $announcement_model;

	use PaginatorTraits;

	public function __construct(Model $model)
	{
		$this->announcement_model = $model;
	}

	public function store($data)
	{
		return $this->announcement_model->newQuery()->create($data);
	}

	public function index($data)
	{
		$record = $this->announcement_model->newQuery();

		if($data['isActive'] == true) {
			$record->where('is_active', true);
		} else {
			$record->where('is_active', false);
		}

		return $this->convertToMetaAndData($record->with('admin')
			->paginate($data['perPage'], '*', 'page', $data['page']));
	}

	public function markNotActive($id_announcement)
	{
		$record = $this->announcement_model->newQuery()->find($id_announcement);

		if($record) {
			$record->is_active = false;
			$record->save();

			return $record;
		}

		throw new \Exception('No record found, please check your id');
	}
}
