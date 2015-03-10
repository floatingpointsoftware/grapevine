<?php
namespace FloatingPoint\Grapevine\Library\Database;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class UpdatedByObserver
{
	public function created(UpdatedByCache $model)
    {
        $caches = $model->updatedByCaches();
        $updatedBy = $model->userId;

        foreach ($caches as $cache) {
            $table = (new $cache)->getTable();
            $field = $this->getField($cache);

            DB::update("UPDATE {$table} SET updated_by = {$updatedBy} WHERE id = {$model->$field}");
        }
    }

    /**
     * Retrieve the related field for the model->class relationship.
     *
     * @param Model $model
     * @param string $cache
     * @return string
     */
    protected function getField($cache)
    {
        $class = Str::snake(class_basename($cache));

        return $class.'_id';
    }
}
