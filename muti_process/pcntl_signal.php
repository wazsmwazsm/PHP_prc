<?php

// 使用 kill -USR2 [pid] 试试
declare(ticks = 1);

function usr2_handler($signo)
{
    exit("hello, i am user 2 signel handler!\n");
}

pcntl_signal(SIGUSR2, "usr2_handler");

while(1)
{
    $a = 1; // 保证 declare(ticks = 1) 生效, 需要执行低级语句保证 usr2_handler 会被调用
}
