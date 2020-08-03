<?php
namespace App\Services\HeadFamily;

use App\HeadFamily;
use App\Repository\HeadFamilyRepository;
use App\Repository\ResidentRepository;
use App\Resident;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class Service implements Contract {
	private $resident_repo, $head_family_repo;

	public function __construct(Resident $resident, HeadFamily $headFamily)
	{
		$this->resident_repo = new ResidentRepository($resident);
		$this->head_family_repo = new HeadFamilyRepository($headFamily);
	}

	public function create($data)
	{
		DB::beginTransaction();
		try {
			$head_family = $this->head_family_repo->create($data['head_family']);

			$data['resident'] = array_map(function ($resident) use ($head_family) {
				return array_merge($resident, [
					'head_family_id' => $head_family['id'],
					'role_id' => 2,
					'password' => Hash::make($resident['nik_id'])
				]);
			}, $data['resident']);

			$resident = $this->resident_repo->create($data['resident']);
			DB::commit();

			return  [
				'head_family' => $head_family,
				'resident' => $resident
			];
		} catch (\Exception $err) {
			DB::rollBack();
		}
	}

	public function update($data)
	{
		DB::beginTransaction();
		try {
			$head_family = $this->head_family_repo->update($data['head_family']);

			$ids = array_map(function ($resident) {
				return $resident['id'];
			}, $data['resident']);
			$this->resident_repo->syncResident($ids, $data['head_family']['id']);
			$resident = $this->resident_repo->update($data['resident']);
			
			DB::commit();

			return [
				'head_family' => $head_family,
				'resident' => $resident
			];
		} catch (\Exception $err) {
			DB::rollBack();
		}
	}

	public function delete($id)
	{
		// TODO: Implement delete() method.
	}

	public function index($data)
	{
		return $this->head_family_repo->index($data);
	}

	public function show($id)
	{
		return $this->resident_repo->findById($id);
	}
}
