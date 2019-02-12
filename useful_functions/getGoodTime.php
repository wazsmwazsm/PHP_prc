<?php

function getGoodTime($seconds)
{
    $d = floor($seconds / (3600 * 24));
    $h = floor(($seconds % (3600 * 24)) / 3600);
    $m = floor((($seconds % (3600 * 24)) % 3600) / 60);
    $s = floor((($seconds % (3600 * 24)) % 3600) % 60);

    if ($d > 0){
        return $d.'d'.$h.'h'.$m.'m'.$s.'s';
    } 

    if ($h > 0){
        return $h.'h'.$m.'m'.$s.'s';
    }    

    if ($m > 0) {
        return $m.'m'.$s.'s';
    } 

    return $s.'s';
}

var_dump(getGoodTime(12));
var_dump(getGoodTime(344));
var_dump(getGoodTime(11223));
var_dump(getGoodTime(199889));
