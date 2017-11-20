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

        // 上桩
        $stub->method('doSomething')
             ->will($this->returnCallback('str_rot13'));

        // $stub->doSomething() 根据提供的参数返回不同的值。
        $this->assertEquals('fbzrguvat', $stub->doSomething('something'));
    }

}
