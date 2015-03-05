<?php
namespace Tests\Unit\Library\Support;

use FloatingPoint\Grapevine\Library\Support\Links;
use Tests\UnitTestCase;

class LinksTest extends UnitTestCase
{
    public function init()
    {
        $this->links = new Links;
    }

    public function testScoping()
    {
        //$this->app['url']->shouldReceive('route')->with('category.browse', [], true, null);

        $route = $this->links->category->browse();


    }
}
