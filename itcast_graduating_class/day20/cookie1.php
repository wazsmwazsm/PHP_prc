<?php

//注意：setcookie和header函数一样，写之前不能有任何输出

//增加cookie数据 
//临时cookie，会话cookie，关闭浏览器就失效
setcookie('class_name','PHP34');

//删除值
// setcookie('class_name',''); 
// setcookie('class_name'); 

//设置有效期
//有效期为60S之后,浏览器去判断
setcookie('long_class_name','long_PHP34',time()+60);
//删除cookie的标准做法
setcookie('long_class_name','',time()-1);

//永久有效的设置，整形的最大值
setcookie('long_class_name','long_PHP34',PHP_INT_MAX);


//有效路径:cookie只在当前目录或其后代目录有效，上级目录获取不到
//指的不是磁盘上的路径关系，而是URL上面的路径关系
//不同路径下同名的cookie可以同时存储于浏览器端

//设置当前cookie整站有效
setcookie('path_anywhere','whereami',0,'/');

//设置有效域
setcookie('domain_name','in_test_kang',0,'','kang.com');//参数为一级域名，旗下的二级域名都可用了

//不开启仅安全传输
setcookie('not_secure','php34',0,'','',false);
//开启仅安全模式
setcookie('do_secure','php34',0,'','',true);

//HTTPONLY,建议该属性设置为true
setcookie('not_httponly','php34',0,'','',false,false);
setcookie('do_httponly','php34',0,'','',false,true);

//cookie只能设置值为字符串，
//如下设置了两个cookie，但是读取就变成一个数组了
//php在整理cookie数组时将相同名字的cookie整理成一个数组了
//但是自始至终还是两个cookie
setcookie('student[name]','Qinjiaqi');
setcookie('student[gender]','Male');
?>

