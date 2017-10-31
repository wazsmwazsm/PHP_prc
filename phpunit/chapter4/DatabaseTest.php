<?php
require_once __DIR__ . '/vendor/autoload.php';
use PHPUnit\Framework\TestCase;

// 一个有实际意义的多测试间共享基境的例子是数据库连接
// 在测试之间共享基境会降低测试的价值。潜在的设计问题是对象之间并非松散耦合。
class DatabaseTest extends TestCase
{
    protected static $dbh;

    public static function setUpBeforeClass()
    {
        self::$dbh = new PDO('sqlite::memory:');
    }

    public function testPDO()
    {   
        $this->assertEmpty(self::$dbh);
    }

    public static function tearDownAfterClass()
    {
        self::$dbh = null;
    }
}
