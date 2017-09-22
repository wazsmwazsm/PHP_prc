<?php

//$file = './upload.jpg';

//实际项目要做成数据库,已经可以完成大部分的http下载了
$list = array(
	1 =>'./qin.php',
	2 =>'./upload.jpg',
	3 =>'./yasuo.zip',
	);

$file = $list[$_GET['id']];
//content-Disposition:告知浏览器接受到主体后的处理方式
//basename获取最后一个/后的名字
header('Content-Disposition: Attachment;filename='. basename($file)); // 以附件的方式处理

$finfo = new finfo(FILEINFO_MIME_TYPE);

$mime = $finfo->file($file);

header('content-type: '.$mime);
header('content-length: '.filesize($file)); //不是必要的

//echo 'HELLO';



$file = './upload.jpg';

//以二进制模式读取,用于处理兼容文本与二进制文件
$handle = fopen($file, 'rb');

while(!feof($handle)){
	echo fgets($handle, 1024);
}

fclose($handle);