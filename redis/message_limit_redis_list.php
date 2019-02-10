<?php

// 业务: 发送短信验证码时，要求 10 分钟不得超过 3 次

function is_limited($phone, $limite_count = 3, $time_limit = 10)
{
    $redis = new Redis();
    $redis->connect('127.0.0.1', 6379);
    
    $now = time();
    $key = 'expires:'. (string) $phone;

    // 清理过期数据
    for ($h = $redis->lIndex($key, 0); ! empty($h) && $h <= $now; $h = $redis->lIndex($key, 0)) { 
        $redis->lPop($key);
    }

    if ($redis->lLen($key) >= $limite_count) {
        return true;
    }

    // 添加新数据
    $redis->rPush($key, $now + $time_limit);
    $redis->expire($key, $time_limit); // 更新过期时间
    return false;
}

var_dump(is_limited('18766667777'));
