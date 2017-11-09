<?php
require_once __DIR__ . '/vendor/autoload.php';
use PHPUnit\Framework\TestCase;

// 标记未完成的测试

class SampleTest extends TestCase
{
    public function testSomething()
    {
        $this->assertTrue(true, '这应该已经是能正常工作的');

        $this->markTestIncomplete('此测试目前尚未实现');
    }

}
