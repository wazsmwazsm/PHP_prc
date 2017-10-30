<?php
require_once __DIR__ . '/vendor/autoload.php';
use PHPUnit\Framework\TestCase;

/*

  如果测试依靠会触发错误的 PHP 函数，例如 fopen ，有时候在测试中使用错误抑制符会很有用。
  通过抑制住错误通知，就能对返回值进行检查，否则错误通知将会导致抛出 PHPUnit\Framework\Error\Notice。

*/

class ErrorSuppressionTest extends TestCase
{
    public function testFileWriting() {
        $writer = new FileWriter;
        $this->assertFalse(@$writer->write('/is-not-writeable/file', 'stuff'));
    }
}
class FileWriter
{
    public function write($file, $content) {
        $file = fopen($file, 'w');
        if($file == false) {
            return false;
        }
    }
}
