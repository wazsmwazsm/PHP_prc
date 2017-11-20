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
        // 直接给出期望返回值的列表
        $stub->method('doSomething')
             ->will($this->onConsecutiveCalls(2, 3, 5, 7));

        // $stub->doSomething() 每次返回值都不同
        $this->assertEquals(2, $stub->doSomething());
        $this->assertEquals(3, $stub->doSomething());
        $this->assertEquals(5, $stub->doSomething());
        $this->assertEquals(7, $stub->doSomething());
    }

}
