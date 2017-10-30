<?php
require_once __DIR__ . '/vendor/autoload.php';
use PHPUnit\Framework\TestCase;

class OutputTest extends TestCase
{
    public function testExpectFooActualFoo()
    {
        // 测试输出的值是不是字符串
        $this->expectOutputString('foo');
        print 'foo';
    }

    public function testIsJson()
    {
        $a = '{"status":0,"msg":"Data is empty","server_time":1509364948,"data":[]}';
        $this->assertJson($a);
    }
}
