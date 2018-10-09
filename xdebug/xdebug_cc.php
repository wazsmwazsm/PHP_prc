<?php

function xdebug_cc()
{
    // 获取覆盖率
    $output = xdebug_get_code_coverage();
    foreach ($output as $file => $linearr) {
        var_dump($file, $linearr);
    }
}

// 开启代码覆盖率
xdebug_start_code_coverage(XDEBUG_CC_UNUSED); // 显示未执行行
// 注册处理函数
register_shutdown_function('xdebug_cc');
