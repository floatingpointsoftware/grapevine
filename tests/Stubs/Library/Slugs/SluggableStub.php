<?php 
namespace Tests\Stubs\Library\Slugs; 

use FloatingPoint\Grapevine\Library\Slugs\Sluggable;

class SluggableStub
{
    use Sluggable;

    public function __construct($title = 'My Model')
    {
        $this->title = $title;
    }

    public $attributes;

    public function __get($key)
    {
        if($key == 'attributes') {
            return $this->attributes;
        }
    }
}
