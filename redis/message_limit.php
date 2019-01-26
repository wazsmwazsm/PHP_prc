<?php

// 业务: 发送短信验证码时，要求 10 分钟不得超过 3 次

function is_limited($phone)
{
    $redis = new Redis();
    $redis->connect('127.0.0.1', 6379);
    
    $limite_count = 3;
    $time_limit = 10 * 60; // 10 分钟
    $key = 'expires:'. (string) $phone;

    // 缓存是否存在
    if ( ! $redis->exists($key)) { 
        
        $out_time = time() + $time_limit; // 计算过期时间
        $value = [$out_time, ];
        // 设置 redis 过期时间 time_limit， time_limit 时间内无更新的话舍弃掉这个缓存
        $redis->setex($key, $time_limit, serialize($value)); 

        return true;
    } 

    // 获取缓存信息
    $value = unserialize($redis->get($key));
    
    // 删除过期数据
    while (isset($value[0]) && $value[0] <= time()) {
        array_shift($value);
    }

    // 次数是否超限制
    if (count($value) >= $limite_count) {
        return false;
    }

    // 添加新数据
    $value[] = time() + $time_limit;
    // 设置 redis 过期时间 time_limit， time_limit 时间内无更新的话舍弃掉这个缓存
    $redis->setex($key, $time_limit, serialize($value));

    return true;
}

var_dump(is_limited('1874488449'));
