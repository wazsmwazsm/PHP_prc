<?php
namespace hello;
use PHPUnit\Framework\TestCase;

class KaoTest extends TestCase
{
    public function testKao()
    {
        $cao = new Kao();
        $this->assertEquals('b', $cao->cao());
    }
}
