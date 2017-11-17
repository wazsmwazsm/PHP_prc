<?php
require_once __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/SomeClass.php';

use PHPUnit\Framework\TestCase;

class StubTest extends TestCase
{
    public function testStub()
    {
        // 为 SomeClass 类创建桩件
        $stub = $this->createMock(SomeClass::class);

        // 上桩
        // 用 willReturn($value) 返回简单值。这个简短的语法相当于 will($this->returnValue($value))
        $stub->method('doSomething')->willReturn('foo');

        // 现在调用 $stub->doSomething() 将返回 'foo'。
        $this->assertEquals('foo', $stub->doSomething());
    }

}
