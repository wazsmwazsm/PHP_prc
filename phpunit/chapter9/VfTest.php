<?php

require_once __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/FileExample.php';

use PHPUnit\Framework\TestCase;
use org\bovigo\vfs\vfsStream;
use org\bovigo\vfs\vfsStreamWrapper;
use org\bovigo\vfs\vfsStreamDirectory;

/*

    本测试的优点

    1、测试本身更加简洁。

    2、vfsStream 让开发者能够完全控制被测代码所处的文件系统环境。

    3、由于文件系统操作不再对真实文件系统进行操作，tearDown() 方法中的清理操作不再需要了。

*/

class ExampleTest extends TestCase
{

    protected function setUp()
    {
        vfsStreamWrapper::register();
        vfsStreamWrapper::setRoot(new vfsStreamDirectory('exampleDir'));
    }

    public function testDirectoryIsCreated()
    {
        $example = new Example('id');
        $this->assertFalse(vfsStreamWrapper::getRoot()->hasChild('id'));

        $example->setDirectory(vfsStream::url('exampleDir'));
        $this->assertTrue(vfsStreamWrapper::getRoot()->hasChild('id'));
    }

}
