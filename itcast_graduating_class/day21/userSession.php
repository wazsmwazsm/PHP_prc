<?php
//自定义session存储方式
//1、方便大量的session数据管理
//2、方便服务器集群共享session数据

//session数据表
// create table `session` (
// 	session_id varchar(40) not null default '',
// 	session_content text,
//	last_time int not null default 0, 
// 	primary key(session_id)
// )charset=utf8 engine=myisam;



function userSessionBegin(){
	echo "<br>Begin<br>";
	//初始化数据库连接
	$link = mysql_connect('localhost:3306','root','wzdanzsm');
	mysql_query('set names utf8');
	mysql_query('use `shop34`');
}

//进行收尾工作
function userSessionEnd(){
	echo "<br>End<br>";
	return true;
}

/*
	读操作
	执行时机：session_start时调用
	工作：	  从当前session数据库区读取内容
	@param $sess_id string
	@retrun string
*/
function userSessionRead($sess_id){
	echo "<br>Read<br>";

	//执行查询语句
	$sql = "SELECT session_content FROM `session` WHERE session_id='$sess_id' ";
	$result = mysql_query($sql);
	if($row = mysql_fetch_assoc($result)){
		return $row['session_content'];
	} else {
		//没有找到，返回空字符串
		return '';
	}

}
/*
	写操作
	执行时机：脚本周期结束时，PHP在整理收尾
	工作：	  将当前脚本处理好的session数据，持久化的写入到数据库中
	@param $sess_id string
	@param $sess_content string 序列化好的session字符串
	@retrun bool
*/
function userSessionWrite($sess_id, $sess_content){
	echo "<br>Write<br>";

	//写操作
	//REPLACE:有的时候更新，没有的时候插入
	//做法1
	// $sql = "INSERT INTO `session` VALUES ('$sess_id','$sess_content') ON DUPLICATE KRY UPDATE session_content='$sess_content', last_time=unix_timestamp()";
	$sql = "REPLACE INTO `session` VALUES ('$sess_id','$sess_content',unix_timestamp())";
	
	return  mysql_query($sql);
}

/*
	删除操作
	执行时机：用户调用destroy销毁session时调用
	工作：	  删除当前session的数据区
	@param $sess_id string
	@retrun bool
*/
 
function userSessionDelete($sess_id){
	echo "<br>Delete<br>";

	//删除操作
	$sql = "DELETE FROM `session` WHERE session_id = '$sess_id'";

	return mysql_query($sql);
}

/*
	垃圾回收
	执行时机：开启session机制时，有概率的执行
	工作：	  删除那些过期的session数据区
	@param $max_lifetime
	@retrun bool
*/

function userSessionGC($max_lifetime){
	echo "<br>GC<br>";
	
	$sql = "DELETE FROM `session` WHERE last_time < unix_timestamp() - $max_lifetime";
	return mysql_query($sql);

}


//设置session存储方式句柄

session_set_save_handler(
	'userSessionBegin', 
	'userSessionEnd', 
	'userSessionRead', 
	'userSessionWrite', 
	'userSessionDelete', 
	'userSessionGC');

//建议设置完改成user表示自定义
ini_set('session.save_handler', 'user');