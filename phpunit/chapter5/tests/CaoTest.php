<?php
namespace hello;
use PHPUnit\Framework\TestCase;

class CaoTest extends TestCase
{
    public function testCao()
    {
        $cao = new Cao();
        $this->assertEquals('a', $cao->kao());
    }
}
