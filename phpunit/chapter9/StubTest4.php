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

        // 创建从参数到返回值的映射。
        // 每行是一条数据, 每行最后一个是返回值, 前面的是参数
        $map = [
            ['a', 'b', 'c', 'd'],
            ['e', 'f', 'g', 'h']
        ];

        // 上桩
        $stub->method('doSomething')
             ->will($this->returnValueMap($map));

        // $stub->doSomething() 根据提供的参数返回不同的值。
        $this->assertEquals('d', $stub->doSomething('a', 'b', 'c'));
        $this->assertEquals('h', $stub->doSomething('e', 'f', 'g'));
    }

}
