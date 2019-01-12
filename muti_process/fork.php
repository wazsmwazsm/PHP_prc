<?php
/* 注意，此程序在 docker 里不能完整运行，docker 的进程管理和真实操作系统不一样 */

// fork是创建了一个子进程，父进程和子进程 都从fork的位置开始向下继续执行，
// 不同的是父进程执行过程中，得到的fork返回值为子进程 号，而子进程得到的是0。
$pid = pcntl_fork();

if ($pid == -1) { // -1 失败
    throw new Exception('fork faild');
} else if ($pid > 0) { // 得到子进程号，这里是父进程执行的逻辑
    // 获取当前进程的进程号
    $p_pid = posix_getpid(); 
    cli_set_process_title("im parent process {$p_pid}."); // 设置进程标题
    pcntl_wait($status); // 等待子进程中断，防止子进程成为僵尸进程。
} else { // 得到的是 0，这里是子进程执行的逻辑
    // 获取当前进程的进程号
    $cpid = posix_getpid();
    cli_set_process_title("im sub process $cpid");
    sleep(5);
}

