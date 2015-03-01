<?php 
namespace Tests\Stubs\Library\Database;

use Illuminate\Support\Collection;

class RepositoryModelStub
{
    private $isDirty;

    public function all()
    {
        return [1,2,3];
    }

    public function where($col, $operatorOrValue, $value = null)
    {
        if($value == 999) {
            $mock = \Mockery::mock('someobj');
            $mock->shouldReceive('first')->andReturn(null);
            return $mock;
        } else if ($col == 'null') {
            return null;
        }

        return new Collection([1,2,3]);
    }

    public function getBy($column, $value)
    {
        if($column == 'exists') {
            return $this;
        } else {
            return null;
        }
    }

    public function forceDelete()
    {
        return 'forced';
    }

    public function delete()
    ategory
        return true;
    }

    public function save()
    {
        return true;
    }

    public function setIsDirty($isDirty)
    {
        $this->isDirty = $isDirty;
    }

    public function getDirty()
    {
        return $this->isDirty;
    }

    public function touch()
    {
        return true;
    }
}
