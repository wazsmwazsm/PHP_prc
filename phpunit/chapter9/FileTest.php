<?php

require_once __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/FileExample.php';

use PHPUnit\Framework\TestCase;

/*

    本测试的缺点

    1、和任何其他外部资源一样，文件系统可能会间歇性的出现一些问题，这使得和它交互的测试变得不可靠。

    2、在 setUp() 和 tearDown() 方法中，必须确保这个目录在测试前和测试后均不存在。

    3、如果测试在 tearDown() 方法被调用之前就终止了，这个目录就会遗留在文件系统中。

*/

class ExampleTest extends TestCase
{

    protected function setUp()
    {
        if(file_exists(dirname(__FILE__).'/id')) {
            rmdir(dirname(__FILE__).'/id');
        }
    }

    protected function tearDown()
    {
        if(file_exists(dirname(__FILE__).'/id')) {
            rmdir(dirname(__FILE__) . '/id');
        }
    }

    public function testDirectorylsCreated()
    {
        $example = new Example('id');
        $this->assertFalse(file_exists(dirname(__FILE__).'/id'));

        $example->setDirectory(dirname(__FILE__));
        $this->assertTrue(file_exists(dirname(__FILE__).'/id'));

    }

}
