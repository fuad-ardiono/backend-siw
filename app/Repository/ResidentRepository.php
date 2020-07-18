<?php
namespace App\Repository;

use App\Traits\PaginatorTraits;
use Illuminate\Database\Eloquent\Model;

class ResidentRepository {
	private $resident_model;

	use PaginatorTraits;

	public function __construct(Model $model)
	{
		$this->resident_model = $model;
	}

	public function findByNik($nik)
	{
		return $this->resident_model->newQuery()->where('nik_id', $nik)
			->with(['role', 'head_family'])->first();
	}

	public function create($data)
	{
		return array_map(function($resident) {
			return $this->resident_model->newQuery()->create($resident);
		}, $data);
	}

	public function update($data)
	{
		return array_map(function ($resident) {
			return $this->resident_model->newQuery()->find($resident['id'])->update($resident);
		}, $data);
	}

	public function findAll()
	{
		return $this->resident_model->newQuery()->get();
	}

	public function findById($id)
	{
		return $this->resident_model->newQuery()->findOrFail($id);
	}

	public function delete($id)
	{
		return $this->resident_model->newQuery()->findOrFail($id)->delete();
	}

	public function index($data)
	{
		$record = $this->resident_model->newQuery();

		return $this->convertToMetaAndData($record->with('head_family')
			->paginate($data['perPage'], '*', 'page', $data['page']));
	}
}
