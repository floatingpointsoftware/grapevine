<?php
namespace FloatingPoint\Grapevine\Library\Database;

interface RepositoryInterface
{
    /**
     * Delete a specific resource. Returns the resource that was deleted.
     *
     * @param Resource  $resource
     * @param boolean $permanent
     * @return Resource
     */
    public function delete($resource, $permanent = false);

    /**
     * Get a specific resource.
     *
     * @param integer $id
     * @return Resource
     */
    public function getById($id);

    /**
     * Acts as a generic method for retrieving a record by a given field/value pair.
     *
     * @param $field
     * @param $value
     * @return mixed
     */
    public function getBy($field, $value);

    /**
     * Similar to getById, but should raise an EntityNotFoundException.
     *
     * @param $id
     * @return mixed
     */
    public function requireById($id);

    /**
     * @param       $resource
     * @param array $data
     * @return Resource
     */
    public function update($resource, $data = []);

    /**
     * Saves the provided resource.
     *
     * @param $resource
     * @return mixed
     */
    public function save($resource);

    /**
     * Save 1-n resources.
     *
     * @param $resources
     * @return mixed
     */
    public function saveAll();
}
