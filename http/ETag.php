<?php

// 动态脚本生成 ETag, 使用内容的 md5

ob_start();

echo (int)(time() / 60);

$contents = ob_get_contents();
ob_end_clean();

// create ETag
$ETag = md5($contents);

if ($_SERVER['HTTP_IF_NONE_MATCH'] == $ETag) {
    header('HTTP/1.1 304 Not Modified');
} else {
    header('ETag:'.$ETag);
    echo $contents;
}
