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

        // $stub->doSomething($argument) 返回 str_rot13($argument)
        $this->assertEquals('fbzrguvat', $stub->doSomething('something'));
    }

}
