<?php
namespace App\Repository;

use App\Traits\PaginatorTraits;
use Illuminate\Database\Eloquent\Model;

class ComplaintRepository {
	private $complaint_model;

	use PaginatorTraits;

	public function __construct(Model $model)
	{
		$this->complaint_model = $model;
	}

	public function store($data)
	{
		return $this->complaint_model->newQuery()->create($data);
	}

	public function index($data)
	{
		$record = $this->complaint_model->newQuery();

		if($data['isResolved'] == true) {
			$record->where('is_resolved', true);
		} else {
			$record->where('is_resolved', false);
		}

		return $this->convertToMetaAndData($record->with('resident')
			->paginate($data['perPage'], '*', 'page', $data['page']));
	}

	public function markIsResolved($id_complaint)
	{
		$record = $this->complaint_model->newQuery()->find($id_complaint);

		if($record) {
			$record->is_resolved = true;
			$record->save();

			return $record;
		}

		throw new \Exception('No record found, please check your id');
	}
}
