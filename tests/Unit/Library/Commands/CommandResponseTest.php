<?php

namespace Test\Unit\Library\Commands;

use FloatingPoint\Grapevine\Library\Commands\CommandResponse;

class CommandResponseTest extends \Tests\UnitTestCase
{
    /**
     * @var CommandResponse
     */
    protected $response;

    public function setUp()
    {
        $this->response = new CommandResponse();
        parent::setUp();
    }

    /**
     * @test
     */
    public function checkResponseInstance()
    {
        $this->assertInstanceOf('FloatingPoint\Grapevine\Library\Commands\CommandResponse', $this->response);
    }

    /**
     * @test
     */
    public function setSuccess()
    {
        $this->response->setSuccess(true);
        $this->assertTrue($this->response->successful());
        $this->assertFalse($this->response->failed());
    }

    /**
     * @test
     */
    public function setFailure()
    {
        $this->response->setSuccess(false);
        $this->assertFalse($this->response->successful());
        $this->assertTrue($this->response->failed());
    }

    /**
     * @test
     */
    public function setAndRetrieveResponseFlashData()
    {
        $this->response->setFlashData(['flash_success' => 'successful']);
        $this->assertArrayHasKey('flash_success',$this->response->getFlashData());
        $this->assertTrue($this->response->hasFlashData());
        $this->assertEquals('successful', $this->response->getFlashData()['flash_success']);
    }

    /**
     * @test
     */
    public function setAndRetrieveResponseErrors()
    {
        $this->response->setErrors('baz');
        $this->assertEquals('baz', $this->response->getErrors());
    }

    /**
     * @test
     */
    public function setAndRetrieveResponseData()
    {
        $this->response->setData(['foo' => 'bar']);
        $this->assertArrayHasKey('foo', $this->response->getData());
        $this->assertEquals('bar', $this->response->getData()['foo']);
    }

    /**
     * @test
     */
    public function setSuccessWithString()
    {
        $this->response->success('Successful');
        $this->assertArrayHasKey('flash_success', $this->response->getFlashData());
        $this->assertTrue($this->response->hasFlashData());
        $this->assertTrue($this->response->successful());
        $this->assertFalse($this->response->failed());
        $this->assertEquals('Successful', $this->response->getFlashData()['flash_success']);
    }

    /**
     * @test
     */
    public function setSuccessWithArray()
    {
        $this->response->success(['flash_success' => 'Successful']);
        $this->assertArrayHasKey('flash_success', $this->response->getFlashData());
        $this->assertTrue($this->response->hasFlashData());
        $this->assertTrue($this->response->successful());
        $this->assertFalse($this->response->failed());
        $this->assertEquals('Successful', $this->response->getFlashData()['flash_success']);
    }

    /**
     * @test
     */
    public function setFailureWithString()
    {
        $this->response->fail('Failure');
        $this->assertArrayHasKey('flash_error', $this->response->getFlashData());
        $this->assertTrue($this->response->hasFlashData());
        $this->assertFalse($this->response->successful());
        $this->assertTrue($this->response->failed());
        $this->assertEquals('Failure', $this->response->getFlashData()['flash_error']);
    }

    /**
     * @test
     */
    public function setFailureWithArray()
    {
        $this->response->fail(['flash_error' => 'Failure']);
        $this->assertArrayHasKey('flash_error', $this->response->getFlashData());
        $this->assertTrue($this->response->hasFlashData());
        $this->assertFalse($this->response->successful());
        $this->assertTrue($this->response->failed());
        $this->assertEquals('Failure', $this->response->getFlashData()['flash_error']);
    }

    /**
     * @test
     */
    public function setErrorsArrayAndFail()
    {
        $this->response->setErrors(['flash_error' => 'Failure']);
        $this->assertArrayHasKey('flash_error', $this->response->getErrors());
        $this->response->fail('boo');
        $this->assertEquals('Failure', $this->response->getFlashData()['flash_error']);
    }

    /**
     * @test
     */
    public function setFailureWithError()
    {
        $this->response->setErrors('Exception');
        $this->response->fail('Failure');
        $this->assertFalse($this->response->successful());
        $this->assertTrue($this->response->failed());
        $this->assertArrayHasKey('flash_error', $this->response->getFlashData());
        $this->assertTrue($this->response->hasFlashData());
        $this->assertEquals('Exception', $this->response->getFlashData()['flash_error']);
    }

    /**
     * @test
     */
    public function retrieveResponseAsJson()
    {
        $this->response->success('Successful');
        $expected_json = '{"errors":null,"data":null,"flash_data":{"flash_success":"Successful"},"success":true}';
        $this->assertEquals($expected_json, $this->response->toJson());
    }

}
