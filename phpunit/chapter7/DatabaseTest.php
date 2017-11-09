<?php
require_once __DIR__ . '/vendor/autoload.php';
use PHPUnit\Framework\TestCase;

// 跳过测试

class DatabaseTest extends TestCase
{
    protected function setUp()
    {
        if (!extension_loaded('mysqli')) {
            $this->markTestSkipped(
              'MySQLi 扩展不可用。'
            );
        }
    }

    public function testConnection()
    {
        // ...
    }
}
