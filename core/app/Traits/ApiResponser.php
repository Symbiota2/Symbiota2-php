<?php

namespace App\Traits;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Validator;
use Illuminate\Pagination\LengthAwarePaginator;
use Responder;

trait ApiResponser
{
	private function successResponse($data)
	{
		return responder()->success($data)->respond();
	}

	protected function errorResponse($message, $code)
	{
		return responder()->error($code, $message)->respond();
	}

	protected function showAll($collection, $transformer)
	{
		if ($collection->count([]) === 0) {
			return $this->errorResponse('No data', 404);
		}

		//$transformer = $collection->getEntityManager()->transformer;

		//$collection = $this->filterData($collection, $transformer);
		//$collection = $this->sortData($collection, $transformer);
		//$collection = $this->paginate($collection);
		$collection = $this->transformData($collection->findAll(), $transformer);
		//$collection = $this->cacheResponse($collection);

		return $this->successResponse($collection);
	}

	protected function showOne($instance)
	{
		return $this->successResponse($this->transformData($instance, $instance->transformer));
	}

	protected function filterData($collection, $transformer)
	{
		foreach (request()->query() as $query => $value) {
			$attribute = $transformer::originalAttribute($query);

			if (isset($attribute, $value)) {
				$collection = $collection->where($attribute, $value);
			}
		}

		return $collection;
	}

	protected function sortData($collection, $transformer)
	{
		if (request()->has('sort_by')) {
			$attribute = $transformer::originalAttribute(request()->sort_by);

			$collection = $collection->sortBy->{$attribute};
		}

		return $collection;
	}

	protected function paginate($collection)
	{
		$rules = [
			'per_page' => 'integer|min:2|max:50',
		];

		Validator::validate(request()->all(), $rules);

		$page = LengthAwarePaginator::resolveCurrentPage();

		$perPage = 15;
		if (request()->has('per_page')) {
			$perPage = (int) request()->per_page;
		}

		$results = $collection->slice(($page - 1) * $perPage, $perPage)->values();

		$paginated = new LengthAwarePaginator($results, $collection->count(), $perPage, $page, [
			'path' => LengthAwarePaginator::resolveCurrentPath(),
		]);

		$paginated->appends(request()->all());

		return $paginated;

	}

	protected function transformData($data, $transformer)
	{
		return (new $transformer)->transform($data);
	}

	protected function cacheResponse($data)
	{
		$url = request()->url();
		$queryParams = request()->query();

		ksort($queryParams);

		$queryString = http_build_query($queryParams);

		$fullUrl = "{$url}?{$queryString}";

		return Cache::remember($fullUrl, 30/60, function() use($data) {
			return $data;
		});
	}
}