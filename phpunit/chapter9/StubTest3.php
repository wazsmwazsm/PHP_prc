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

        // 上桩 返回对桩件对象的引用
        $stub->method('doSomething')
             ->will($this->returnSelf());

        // $stub->doSomething() 返回 $stub
        $this->assertEquals($stub, $stub->doSomething());
    }

}
