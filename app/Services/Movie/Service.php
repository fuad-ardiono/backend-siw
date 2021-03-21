<?php
namespace App\Services\Movie;

use App\Movie;
use App\Repository\MovieRepository;

class Service implements Contract {
	private MovieRepository $movieRepository;

	public function __construct(
		Movie $movie
	)
	{
		$this->movieRepository = new MovieRepository($movie);
	}

	public function create($data)
	{
		return $this->movieRepository->store($data);
	}

	public function update($id, $data)
	{
		return $this->movieRepository->update($id, $data);
	}

	public function delete($id)
	{
		return $this->movieRepository->delete($id);
	}
}
