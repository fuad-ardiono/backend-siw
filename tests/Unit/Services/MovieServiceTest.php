<?php

namespace Tests\Unit\Services;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Artisan;
use Tests\TestCase;
use App\Movie;

class MovieServiceTest extends TestCase
{
	protected $movieService;

	public function setUp(): void
	{
		parent::setUp();
		$this->movieService = app()->make('App\Services\Movie\Service');
		Artisan::call('migrate');
	}

	public function test_createMovie() {
		$data = [
			'id' => 1,
			'title' => 'Inception',
			'year' => 2010
		];

		$result = $this->movieService->create($data);

		$this->assertTrue($result instanceof Movie);
		$this->assertEquals($data['title'], $result['title']);
	}

	public function test_updateMovie() {
		$data = [
			'id' => 1,
			'title' => 'Inception',
			'year' => 2010
		];

		$this->movieService->create($data);

		$data['title'] = 'Transformers';
		$result = $this->movieService->update($data['id'], $data);

		$this->assertTrue($result instanceof Movie);
		$this->assertEquals($data['title'], $result['title']);
	}

	public function test_deleteMovie()
	{
		$data = [
			'id' => 1,
			'title' => 'Inception',
			'year' => 2010
		];

		$this->movieService->create($data);
		$result = $this->movieService->delete($data['id']);

		$this->assertTrue($result instanceof Movie);
		$this->assertEquals($data['id'], $result['id']);
	}

	public function test_deleteUndefinedId()
	{
		try {
			$this->movieService->delete(5);
			$this->assertTrue(false);
		} catch (\Exception $err) {
			$this->assertTrue(true);
		}
	}

	public function test_updateUndefinedId()
	{
		$data = [
			'id' => 1,
			'title' => 'Inception',
			'year' => 2010
		];

		try {
			$this->movieService->update(10, $data);
			$this->assertTrue(false);
		} catch (\Exception $err) {
			$this->assertTrue(true);
		}
	}
}
