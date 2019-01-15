<?php
// 第一次 fork, 获取子进程
$pid = pcntl_fork();

if ($pid == -1) {
    throw new Exception('fork fail');
} else if ($pid > 0) { // 父进程
    cli_set_process_title("im parent process"); 
    if (pcntl_waitpid($pid, $status) != $pid) {
        throw new Exception('waitpid fail');
        exit(1);
    }
    exit(0);
} 

// 之后为子进程
// 第二次 fork, 生成孙子进程
$pid = pcntl_fork();var_dump($pid);
if ($pid == -1) {
    throw new Exception('fork fail');
} else if ($pid > 0) {

    cli_set_process_title("im child process");
    exit(0); 
}
cli_set_process_title("im grandson process");

while(1);



