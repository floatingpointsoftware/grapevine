<?php
namespace FloatingPoint\Grapevine\Library\Database;

use Event;
use Illuminate\Database\Eloquent\ModelNotFoundException;

abstract class EloquentRepository implements RepositoryInterface
{
    /**
     * Stores the model object for querying.
     *
     * @var Eloquent
     */
    protected $model;

    /**
     * Returns a collection of eloquent models consisting of the entire database table's records.
     *
     * @return mixed
     */
    public function getAll()
    {
        return $this->model->get();
    }

    /**
     * Get a specific resource.
     *
     * @param integer $id
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
     * @return Resource
     * @throws ModelNotFoundException
     */
    public function requireById($id)
    {
        return $this->requireBy('id', $id);
    }

    /**
     * Retrieve a model based on the field and value.
     *
     * @param string $field
     * @param mixed $value
     * @return mixed
     */
    public function getBy($field, $value)
    {
        return $this->model->where($field, '=', $value)->first();
    }

    /**
     * Almost identical to getBy, but instead of returning null or empty collections, instead throws an exception.
     *
     * @param string $field
     * @param string $value
     * @return mixed
     * @throws ModelNotFoundException
     */
    public function requireBy($field, $value)
    {
        $model = $this->getBy($field, $value);

        if (!$model) {
            $exception = new ModelNotFoundException;
            $exception->setModel(get_class($this->model));

            throw $exception;
        }

        return $model;
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
     * @param Resource  $resource
     * @param boolean $permanent
     * @fires Resource.Deleted
     * @return Resource
     */
    public function delete($resource, $permanent = false)
    {
        if ($permanent) {
            $resource->forceDelete();
        } else {
            $resource->delete();
        }

        return $resource;
    }

    /**
     * Update a resource based on the id and data provided.
     *
     * @param object $resource
     * @param array  $data
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
     * @return Resource
     */
    public function save($resource)
    {
        $attributes = $resource->getDirty();

        if (!empty($attributes)) {
            $resource->save();
        } else {
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

    /**
     * Require a specific record by its slug.
     *
     * @param string $slug
     * @return mixed
     */
    public function requireBySlug($slug)
    {
        return $this->requireBy('slug', $slug);
    }
}
