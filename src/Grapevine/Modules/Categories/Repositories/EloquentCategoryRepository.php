<?php 

namespace FloatingPoint\Grapevine\Modules\Categories\Repositories; 

use FloatingPoint\Grapevine\Library\Database\EloquentRepository;

class EloquentCategoryRepository extends EloquentRepository
{
    /**
     * Returns a new forum after making
     *
     * @param array $data
     * @return Resource
     */
    public function getNew(array $data = [])
    {
        if (isset($data['parent_id'])) {
            $this->requireById($data['parent_id']);
        }

        return $this->model->newInstance($data);
    }
} 
