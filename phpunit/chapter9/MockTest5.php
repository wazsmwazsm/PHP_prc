<?php

require_once __DIR__ . '/vendor/autoload.php';

use PHPUnit\Framework\TestCase;

class FooTest extends TestCase
{
    // 测试某个方法将会被调用一次，并且以某个特定对象作为参数。
    public function testFunctionCalledTwoTimesWithSpecificArguments()
    {
        $expectedObject = new stdClass;

        $mock = $this->getMockBuilder(stdClass::class)
              ->setMethods(['foo'])
              ->getMock();

        $mock->expects($this->once())
             ->method('foo')
             ->with($this->identicalTo($expectedObject));

        $mock->foo($expectedObject);
    }

}
