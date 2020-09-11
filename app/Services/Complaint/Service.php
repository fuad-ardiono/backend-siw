<?php
namespace App\Services\Complaint;

use App\Complaint;
use App\Repository\ComplaintRepository;
use Illuminate\Support\Facades\Auth;

class Service implements Contract {
	private $complaint_repo;

	public function __construct(Complaint $complaint)
	{
		$this->complaint_repo = new ComplaintRepository($complaint);
	}

	public function store($data, $id_user)
	{
		$data['resident_id'] = $id_user;

		return $this->complaint_repo->store($data);
	}

	public function index($data)
	{
		return $this->complaint_repo->index($data);
	}

	public function marklIsRead($id_complaint)
	{
		return $this->complaint_repo->markIsRead($id_complaint);
	}

	public function marklIsPending($id_complaint)
	{
		return $this->complaint_repo->markIsPending($id_complaint);
	}

	public function marklIsAcc($id_complaint)
	{
		return $this->complaint_repo->markIsAcc($id_complaint);
	}
}
