<?php


function formatBytes($size) { 
    $units = [' B', ' KB', ' MB', ' GB', ' TB']; 
    for ($i = 0; $size >= 1024 && $i < 4; $i++) {
        $size /= 1024; 
    }

    return round($size, 2).$units[$i]; 
}

var_dump(formatBytes(442));
var_dump(formatBytes(22339));
var_dump(formatBytes(2299338));
var_dump(formatBytes(2233299338));
var_dump(formatBytes(5633233339338));
