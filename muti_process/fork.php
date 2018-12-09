<?php

$p_pid = posix_getpid();

$pid = pcntl_fork();

if ($pid == -1) {
    throw new Exception('fork faild');
} else if ($pid > 0) {
    cli_set_process_title("im parent process {$p_pid}.");
    pcntl_wait($status);
} else {
    $cpid = posix_getpid();
    cli_set_process_title("im sub process $cpid, my parent is $p_pid");
    while(1);
}

