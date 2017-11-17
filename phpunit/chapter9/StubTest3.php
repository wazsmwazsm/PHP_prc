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
             ->will($this->returnSelf());

        // 现在调用 $stub->doSomething() 将返回 'foo'。
        $this->assertEquals($stub, $stub->doSomething());
    }

}
