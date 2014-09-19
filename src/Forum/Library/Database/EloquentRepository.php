<?php

namespace FloatingPoint\Forum\Library\Database;

abstract class EloquentRepository implements RepositoryInterface
{
	/**
	 * Many resources within shift may be restricted by the account the user is assigned to (if applicable).
	 * As a result, resources can
	 *
	 * @var bool
	 */
	protected $restrictByAccount = true;

	/**
	 * Stores the model object for querying.
	 *
	 * @var Eloquent
	 */
	protected $model;

	/**
	 * Get a specific resource.
	 *
	 * @param integer $id
	 *
	 * @return Resource
	 */
	public function getById($id)
	{
		return $this->getBy('id', $id);
	}

	/**
	 * Searches for a resource with the id provided. If no resource is found that matches
	 * the $id value, then it will throw a ModelNotFoundException.
	 *
	 * @param $id
	 *
	 * @return Resource
	 * @throws ModelNotFoundException
	 */
	public function requireById($id)
	{
		$model = $this->getById($id);

		if (!$model) {
			throw with(new ModelNotFoundException)->setModel(get_class($this->model));
		}

		return $model;
	}

	/**
	 * Retrieve a model based on the field and value.
	 *
	 * @param $field
	 * @param $value
	 * @return mixed
	 */
	public function getBy($field, $value)
	{
		return $this->model->where($field, '=', $value)->first();
	}

	/**
	 * Returns the model that is being used by the repository.
	 *
	 * @return Eloquent
	 */
	public function getModel()
	{
		return $this->model;
	}

	/**
	 * Sets the model to be used by the repository.
	 *
	 * @param $model
	 */
	public function setModel($model)
	{
		$this->model = $model;
	}

	/**
	 * Create a resource based on the data provided.
	 *
	 * @param array $data
	 * @return Resource
	 */
	public function getNew(array $data = [])
	{
		return $this->model->newInstance($data);
	}

	/**
	 * Delete a specific resource. Returns the resource that was deleted.
	 *
	 * @param object  $resource
	 * @param boolean $permanent
	 *
	 * @return Resource
	 */
	public function delete($resource, $permanent = false)
	{
		if ($permanent) {
			$resource->forceDelete();
		}
		else {
			$resource->delete();
		}

		return $resource;
	}

	/**
	 * Update a resource based on the id and data provided.
	 *
	 * @param object $resource
	 * @param array  $data
	 *
	 * @return Resource
	 */
	public function update($resource, $data = [])
	{
		if (is_array($data) && count($data) > 0) {
			$resource->fill($data);
		}

		return $this->save($resource);
	}

	/**
	 * Saves the resource provided to the database.
	 *
	 * @param $resource
	 *
	 * @return Resource
	 */
	public function save($resource)
	{
		$attributes = $resource->getDirty();

		if (!empty($attributes)) {
			$resource->save();
		}
		else {
			$resource->touch();
		}

		return $resource;
	}

	/**
	 * Save all resources provided to the method.
	 */
	public function saveAll()
	{
		$resources = func_get_args();

		foreach ($resources as $resource) {
			$this->save($resource);
		}
	}
}
