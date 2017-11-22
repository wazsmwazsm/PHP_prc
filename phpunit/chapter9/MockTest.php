<?php

require_once __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/Observer.php';
require_once __DIR__ . '/Subject.php';

use PHPUnit\Framework\TestCase;

class SubjectTest extends TestCase
{
    public function testObserversAreUpdated()
    {
        // 仿件对象的作用就是解决有多个依赖时的测试问题

        // 为 Observer 类建立仿件对象，只模仿 update() 方法。
        // 即确信 Observer 已经测试完毕，不需要再重复测试，直接硬编码
        $observer = $this->getMockBuilder(Observer::class)
                         ->setMethods(['update'])
                         ->getMock();

        // 建立预期状况：update() 方法将会被调用一次，
        // 并且将以字符串 'something' 为参数。
        $observer->expects($this->once())
                 ->method('update')
                 ->with($this->equalTo('something'));

        // 创建 Subject 对象，并将模仿的 Observer 对象连接其上。
        $subject = new Subject('My subject');
        $subject->attach($observer);

        // 在 $subject 对象上调用 doSomething() 方法，
        // 预期将以字符串 'something' 为参数调用
        // Observer 仿件对象的 update() 方法。
        $subject->doSomething();
    }
}
