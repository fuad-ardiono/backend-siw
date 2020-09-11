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

		switch($data['status']){
			case 'read':
				$record->where('status', '=', 'read');
				break;
			case 'pending':
				$record->where('status', '=', 'pending');
				break;
			case 'acc':
				$record->where('status', '=', 'acc');
				break;
			default:
				break;
		}

		return $this->convertToMetaAndData($record->with('resident')->orderByDesc('created_at')
			->paginate($data['perPage'], '*', 'page', $data['page']));
	}

	public function markIsRead($id_complaint)
	{
		$record = $this->complaint_model->newQuery()->find($id_complaint);

		if($record) {
			$record->status = 'read';
			$record->save();

			return $record;
		}

		throw new \Exception('No record found, please check your id');
	}

	public function markIsPending($id_complaint)
	{
		$record = $this->complaint_model->newQuery()->find($id_complaint);

		if($record) {
			$record->status = 'pending';
			$record->save();

			return $record;
		}

		throw new \Exception('No record found, please check your id');
	}

	public function markIsAcc($id_complaint)
	{
		$record = $this->complaint_model->newQuery()->find($id_complaint);

		if($record) {
			$record->status = 'acc';
			$record->save();

			return $record;
		}

		throw new \Exception('No record found, please check your id');
	}
}
