<?php

// 业务: 发送短信验证码时，要求 10 分钟不得超过 3 次
// 其实就是滑动窗口的思路
// 窗口大小就是限制时间，已当前时间+限制时间为左边界过期时间，取值时删除过期的值，实现了窗口滑动
// 也可以使用 zset 来做
function is_limited($phone, $limite_count = 3, $time_limit = 10)
{
    $redis = new Redis();
    $redis->connect('127.0.0.1', 6379);
    
    $now = time();
    $key = 'expires:'. (string) $phone;

    // 清理过期数据，实现窗口滑动
    for ($h = $redis->lIndex($key, 0); ! empty($h) && $h <= $now; $h = $redis->lIndex($key, 0)) { 
        $redis->lPop($key);
    }

    if ($redis->lLen($key) >= $limite_count) { // 统计窗口中的访问是否超限制
        return true;
    }

    // 添加新数据，增加窗口的访问
    $redis->rPush($key, $now + $time_limit);
    $redis->expire($key, $time_limit); // 更新过期时间 (使窗口过期时间等于窗口长度，以防太早过期)
    return false;
}

var_dump(is_limited('18766667777'));
