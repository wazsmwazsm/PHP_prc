<?php

require_once __DIR__ . '/vendor/autoload.php';

use PHPUnit\Framework\TestCase;

class FooTest extends TestCase
{
    public function testFunctionCalledTwoTimesWithSpecificArguments()
    {
        $mock = $this->getMockBuilder(stdClass::class)
              ->setMethods(['set'])
              ->getMock();
        // 期待方法以特定参数被调用二次
        $mock->expects($this->exactly(2))
             ->method('set')
             ->withConsecutive(
                [$this->equalTo('foo'), $this->greaterThan(0)],
                [$this->equalTo('bar'), $this->greaterThan(0)]
             );

        $mock->set('foo', 21);
        // $mock->set('fo1o', 21); // 不是期待的，报错，调用超过两次，报错
        $mock->set('bar', 48);

        // 在实际使用时，用 $mock 代替一些依赖，如果不满足期待
        // 则可以很快定位错误
    }

}
