<?php
ini_set('date.timezone', 'PRC');

$date = (int)(time() / 60) * 100;

$contents = date("D, d M Y H:i:s ", $date).'GMT';
// Cache-Control 
header('Expires:'.$contents);
echo $contents;
