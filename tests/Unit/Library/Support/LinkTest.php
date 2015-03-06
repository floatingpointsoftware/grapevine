<?php
namespace Tests\Unit\Library\Support;

use FloatingPoint\Grapevine\Library\Slugs\Slug;
use FloatingPoint\Grapevine\Modules\Categories\Data\Category;
use FloatingPoint\Grapevine\Modules\Discussions\Data\Discussion;
use Tests\UnitTestCase;

class LinkTest extends UnitTestCase
{
    private $link;

    public function init()
    {
        $this->link = $this->app->make('link');
    }

    public function testScoping()
    {
        $category = new Category;
        $category->slug = new Slug('help');

        $browseCategoryRoute = $this->link->category->browse($category);

        $this->assertRegExp("/help/", $browseCategoryRoute);
    }

    public function testInvalidArguments()
    {
        $this->setExpectedException('ErrorException');

        $browseCategoryRoute = $this->link->category->browse('invalid argument');
    }
}
