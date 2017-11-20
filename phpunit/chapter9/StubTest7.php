<?php
require_once __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/SomeClass.php';

use PHPUnit\Framework\TestCase;

class StubTest extends TestCase
{
    public function testStub()
    {
        // 更详细的创建
        $stub = $this->createMock(SomeClass::class);

        // 上桩的方法抛出一个异常
        $stub->method('doSomething')
             ->will($this->throwException(new Exception('Hei! error!')));

        // $stub->doSomething() 抛出异常
        $stub->doSomething('something');
    }

}
