<?php
require_once __DIR__ . '/vendor/autoload.php';
use PHPUnit\Framework\TestCase;


class MyGuestbookTest extends TestCase
{
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
        return new MyApp_DbUnit_ArrayDataSet(
            [
                'guestbook' => [
                    [
                        'id' => 1,
                        'content' => 'Hello buddy!',
                        'user' => 'joe',
                        'created' => '2010-04-24 17:15:23'
                    ],
                    [
                        'id' => 2,
                        'content' => 'I like it!',
                        'user' => null,
                        'created' => '2010-04-26 12:14:20'
                    ],
                ],
            ]
        );
    }
}
