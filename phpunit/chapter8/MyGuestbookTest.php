<?php
require_once __DIR__ . '/vendor/autoload.php';
use PHPUnit\Framework\TestCase;
use PHPUnit\DbUnit\TestCaseTrait;

class MyGuestbookTest extends TestCase
{
    use TestCaseTrait;
    /**
     * @return PHPUnit_Extensions_Database_DB_IDatabaseConnection
     */
    public function getConnection()
    {
        $dsn = 'mysql:dbname=homestead;host=localhost;port=3360';
        $pdo = new PDO($dsn, 'homestead', 'secret');
        return $this->createDefaultDBConnection($pdo, ':memory:');
    }

    /**
    * @return PHPUnit_Extensions_Database_DataSet_IDataSet
    */
    public function getDataSet()
    {
        return $this->createXMLDataSet('myXmlFixture.xml');
    }

    // public function testCreateDataSet()
    // {
    //     $dataSet = $this->getConnection()->createDataSet();
    // }

    public function testGetRowCount()
    {
        $this->assertEquals(2, $this->getConnection()->getRowCount('guestbook'));
    }

    public function testQuery()
    {
        $queryTable = $this->getConnection()->createQueryTable('guestbook',
          'SELECT id, content, user FROM guestbook'
        );
        $expectedTable = $this->createXMLDataSet('expectedBook.xml')
                       ->getTable("guestbook");

        $this->assertTablesEqual($expectedTable, $queryTable);
    }
}
