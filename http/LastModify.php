<?php

ini_set('date.timezone', 'PRC');

$date = (int)(time() / 60) * 100;

$contents = date("D, d M Y H:i:s ", $date).'GMT';
if ($_SERVER['HTTP_IF_MODIFIED_SINCE'] == $contents) {
    header('HTTP/1.1 304 Not Modified');
} else {
    header('Last-Modified:'.$contents);
    echo $contents;
}
