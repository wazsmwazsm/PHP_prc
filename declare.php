<?php
// declare(ticks=N);
// Zend 引擎每执行 N 条低级语句就去执行一次 register_tick_function() 注册的函数
declare(ticks=1);

// 检查是否已经超时
function check_timeout(){
    static $count = 0;

    $count++;
    sleep(1);
    if ($count > 10) {
        exit('time out!');
    }
}

// 注册 tick 函数
register_tick_function('check_timeout');

// 执行语句
while(1){
   $a = 1;
}
