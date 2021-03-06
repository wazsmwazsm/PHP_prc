<?php

require_once __DIR__ . '/vendor/autoload.php';

use PHPUnit\Framework\TestCase;

class FooTest extends TestCase
{
    // 测试某个方法将会被调用一次，并且以某个特定对象作为参数。
    public function testFunctionCalledTwoTimesWithSpecificArguments()
    {

        $cloneArguments = true;

        $mock = $this->getMockBuilder(stdClass::class)
                     ->enableArgumentCloning()
                     ->getMock();

        // 现在仿件将对参数进行克隆，因此 identicalTo 约束将会失败。
    }

}
