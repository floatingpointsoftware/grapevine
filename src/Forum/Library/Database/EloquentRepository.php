<?php

namespace FloatingPointSoftware\Forum\Library\Database;

abstract class EloquentRepository implements RepositoryInterface
{
	/**
	 * The eloquent model that this repository represents.
	 *
	 * @var Eloquent
	 */
	protected $model;

	/**
	 * Create a resource based on the data provided.
	 *
	 * @param array $data Optional
	 * @return Resource
	 */
	public function getNew(array $data = [])
	{
		$model = $this->getModel();
		$model->fill($data);

		return $model;
	}

	/**
	 * Delete a specific resource. Returns the resource that was deleted.
	 *
	 * @param object $resource
	 * @param boolean $permanent
	 * @return Resource
	 */
	public function delete($resource, $permanent = false)
	{
		// TODO: Implement delete() method.
	}

	/**
	 * Get a specific resource.
	 *
	 * @param integer $id
	 * @return Resource
	 */
	public function getById($id)
	{
		// TODO: Implement getById() method.
	}

	/**
	 * Acts as a generic method for retrieving a record by a given field/value pair.
	 *
	 * @param $field
	 * @param $value
	 * @return mixed
	 */
	public function getBy($field, $value)
	{
		// TODO: Implement getBy() method.
	}

	/**
	 * Similar to getById, but should raise an EntityNotFoundException.
	 *
	 * @param $id
	 * @return mixed
	 */
	public function requireById($id)
	{
		// TODO: Implement requireById() method.
	}

	/**
	 * @param $resource
	 * @param array $data
	 * @return Resource
	 */
	public function update($resource, $data = [])
	{
		// TODO: Implement update() method.
	}

	/**
	 * Saves the provided resource.
	 *
	 * @param $resource
	 * @return mixed
	 */
	public function save($resource)
	{
		// TODO: Implement save() method.
	}

	/**
	 * Save 1-n resources.
	 *
	 * @param $resources
	 * @return mixed
	 */
	public function saveAll()
	{
		// TODO: Implement saveAll() method.
	}

	/**
	 * Returns a new instance of the eloquent model.
	 *
	 * @return mixed
	 */
	public function getModel()
	{
		return (new $this->model);
	}
}
