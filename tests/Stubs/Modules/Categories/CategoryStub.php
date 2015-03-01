<?php 
namespace Tests\Stubs\Modules\Categories;

use FloatingPoint\Grapevine\Modules\Categories\Data\Category;
use Illuminate\Support\Collection;
use Illuminate\Database\Connection;

class CategoryStub extends Category
{
    public function fire($event)
    {
        return $this->fireModelEvent($event);
    }

    public static function whereSlug($slug)
    {
        $collection = \Mockery::mock(Collection::class);
        $collection->shouldReceive('first')->andReturn(new Category());
        return $collection;
    }
}
