<?php 
namespace Tests\Stubs\Library\Slugs; 

use FloatingPoint\Grapevine\Library\Slugs\Sluggable;

class SluggableStub
{
    use Sluggable;

    public $attributes;

    public function __get($key)
    {
        if($key == 'attributes') {
            return $this->attributes;
        }
    }
}
