<?php
// declare(ticks=N);
// Zend 引擎每执行 N 条 nternal statements（opcodes）就去执行一次 register_tick_function() 注册的函数，类似中断机制
// PHP statements 和 internal statements 并非严格一一对应，所以ticks = N的N，可能不好确定
declare(ticks=1);

// 检查是否已经超时
function check_timeout(){
    static $count = 0;
    global $a;
    $count++;
    sleep(1);
    echo $a;
    if ($count > 10) {
        exit("time out!\n");
    }
}

// 注册 tick 函数
register_tick_function('check_timeout');

// 执行语句
$a = 1; 
while(1) {
   ++$a; 
}
