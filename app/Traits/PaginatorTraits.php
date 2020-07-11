<?php
namespace App\Traits;

trait PaginatorTraits {
	public function convertToMetaAndData($pagination_data) {
		$data = $pagination_data->items();
		$meta['current_page'] = $pagination_data->currentPage();
		$meta['per_page'] = (integer) $pagination_data->perPage();
		$meta['last_page'] = $pagination_data->lastPage();
		$meta['total_record'] = $pagination_data->total();

		return [
			'meta_pagination' => $meta,
			'record' => $data
		];
	}
}
