<?php

// 业务: 发送短信验证码时，要求 10 分钟不得超过 3 次

function is_limited($phone)
{
    $redis = new Redis();
    $redis->connect('127.0.0.1', 6379);
    
    $now = time();
    $limite_count = 3; // 不得超过 3 次
    $time_limit = 600; // 10 分钟限制时段
    $key = 'expires:'. (string) $phone;

    // 获取缓存信息
    $value = unserialize($redis->get($key));
    
    // 删除过期数据
    while (isset($value[0]) && $value[0] <= $now) {
        array_shift($value);
    }

    // 次数是否超限制
    if (count($value) >= $limite_count) {
        return true;
    }

    // 添加新数据
    $value[] = $now + $time_limit;
    // 设置 redis 过期时间 time_limit， time_limit 时间内无更新的话舍弃掉这个缓存
    $redis->setex($key, $time_limit, serialize($value));

    return false;
}

var_dump(is_limited('18766667777'));
