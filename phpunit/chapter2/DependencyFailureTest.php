<?php

require_once __DIR__ . '/vendor/autoload.php';
use PHPUnit\Framework\TestCase;

class DependencyFailureTest extends TestCase
{
    public function testOne()
    {
        $this->assertTrue(false);
    }

    /**
     * @depends testOne 当某个测试所依赖的测试失败时，PHPUnit 会跳过这个测试
     */
    public function testTwo()
    {

    }
}
