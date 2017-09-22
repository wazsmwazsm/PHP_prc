<?php

//创建画布
$width = 500;
$height = 300;
$img = imagecreatetruecolor($width, $height);

//分配颜色 
$green = imagecolorallocate($img, 0, 0xff, 0);

$red = imagecolorallocate($img, 0xff, 0, 0);

$blue = imagecolorallocate($img, 0, 0, 0xff);

//填充
//新建画布，填哪都一样
imagefill($img, 0, 0, $red);
//填充矩形
imagefilledrectangle($img, 0, 0, 100, 100, $green);
//输出画布
header('Content-Type:image/png;');
//imagepng($img,'./red.png');
imagepng($img);
//销毁画布资源
imagedestroy($img);
?>