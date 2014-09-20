<?php

namespace FloatingPoint\Grapevine\Library\Database;

use Event;

abstract class EloquentRepository implements RepositoryInterface
{
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
        $model = $this->getById($id);

        if (! $model) {
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

        Event::fire($this->eventNameFromModel('Deleted', $resource),
            [$resource]);

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
     * @fires Resource.Updated
     * @fires Resource.Created
     * @return Resource
     */
    public function save($resource)
    {
        $attributes = $resource->getDirty();
        $event = $resource->exists ? 'Updated' : 'Created';

        if (! empty($attributes)) {
            $resource->save();
        } else {
            $resource->touch();
        }

        Event::fire($this->eventNameFromModel($event, $resource), [$resource]);

        return $resource;
    }

    /**
     * Save all resources provided to the method.
     *
     * @fires Resource.SavedAll
     */
    public function saveAll()
    {
        $resources = func_get_args();

        foreach ($resources as $resource) {
            $this->save($resource);
        }

        Event::fire($this->eventNameFromModel('SavedAll', $this->model),
            $resources);
    }

    /**
     * Generates an event string based on the model of the repository and the required event.
     *
     * @param string $event
     * @param        $model
     * @return string
     */
    protected function eventNameFromModel($event, $model = null)
    {
        $model = $model ?: $this->model;

        $eventParts = [class_basename($model), $event];

        return implode('.', $eventParts);
    }
}
