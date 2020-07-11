<?php
namespace App\Services\Announcement;

use App\Announcement;
use App\Repository\AnnouncementRepository;
use Illuminate\Support\Facades\Auth;

class Service implements Contract {
	private $announcement_repo;

	public function __construct(Announcement $announcement)
	{
		$this->announcement_repo = new AnnouncementRepository($announcement);
	}

	public function store($data)
	{
		$data['admin_id'] = Auth::guard('admin')->user()->id;

		return $this->announcement_repo->store($data);
	}

	public function index($data)
	{
		return $this->announcement_repo->index($data);
	}

	public function markNotActive($id_announcement)
	{
		return $this->announcement_repo->markNotActive($id_announcement);
	}
}
