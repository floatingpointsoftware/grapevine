<?php

namespace Tests\Unit\Library\Commands;

use Tests\UnitTestCase;
use Tests\Stubs\Commands\CommandClient;

class CommandBusTraitTest extends UnitTestCase
{
    protected $busClient;

    public function setUp()
    {
        $this->busClient = new CommandClient();
        parent::setUp();
    }

    /**
    * @test
    */
    public function returnsCommandBusInstance()
    {
        $bus = $this->busClient->getCommandBus();
        $this->assertInstanceOf('FloatingPoint\Grapevine\Library\Commands\CommandBus', $bus);
    }

    /**
    * @test
    */
    public function testCommandReturnsTrue()
    {
        //executeCommand is actually just a wrapper that takes some input and passes it to the command
        $response = $this->busClient->executeCommand(['input' => 'foo']);
        $this->assertTrue($response);
    }

}
