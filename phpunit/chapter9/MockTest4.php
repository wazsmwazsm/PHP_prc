<?php

require_once __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/Observer.php';
require_once __DIR__ . '/Subject.php';

use PHPUnit\Framework\TestCase;

/*

  callback() 约束用来进行更加复杂的参数校验。
  此约束的唯一参数是一个 PHP 回调项(callback)。
  此 PHP 回调项接受需要校验的参数作为其唯一参数，
  并应当在参数通过校验时返回 true，否则返回 false。

*/

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
                 ->with( // 更复杂的参数校验
                   $this->greaterThan(0),
                   $this->stringContains('Something'),
                   $this->callback(function($subject){
                    return is_callable([$subject, 'getName']) &&
                           $subject->getName() == 'My subject';
                  }));

        $subject = new Subject('My subject');
        $subject->attach($observer);

        // doSomethingBad() 方法应当会通过（observer的）reportError()方法
        // 向 observer 报告错误。
        $subject->doSomethingBad();
    }
}
