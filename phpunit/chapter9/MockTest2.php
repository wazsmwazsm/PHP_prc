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

        // 为 Observer 类建立仿件对象，只模仿 reportError() 方法。
        $observer = $this->getMockBuilder(Observer::class)
                         ->setMethods(['reportError'])
                         ->getMock();

        $observer->expects($this->once())
                 ->method('reportError')
                 ->with(  // 对参数更详细的设置
                   $this->greaterThan(0),
                   $this->stringContains('Something'),
                   $this->anything()
                 );

        $subject = new Subject('My subject');
        $subject->attach($observer);

        // doSomethingBad() 方法应当会通过（observer的）reportError()方法
        // 向 observer 报告错误。
        $subject->doSomethingBad();
    }
}
