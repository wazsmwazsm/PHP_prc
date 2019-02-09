<?php

// 业务: 发送短信验证码时，要求 10 分钟不得超过 3 次

function is_limited($phone, $limite_count = 3, $time_limit = 600)
{
    $redis = new Redis();
    $redis->connect('127.0.0.1', 6379);
    
    $now = time();
    $key = 'expires:'. (string) $phone;

    if (empty($redis->lLen($key))) {
        $redis->rPush($key, $now + $time_limit);
        $redis->expire($key, $time_limit); // list 过期时间设置
        return false;
    }

    // 清理过期数据
    for ($h = $redis->lIndex($key, 0); ! empty($h) && $h <= $now; $h = $redis->lIndex($key, 0)) { 
        $redis->lPop($key);
    }

    if ($redis->lLen($key) >= $limite_count) {
        return true;
    }

    // 添加新数据
    $redis->rPush($key, $now + $time_limit);
    return false;
}

var_dump(is_limited('18766667777'));
