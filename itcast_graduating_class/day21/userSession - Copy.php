<?php


// create table `session` (
// 	session_id varchar(40) not null default '',
// 	session_content text,
//	last_time int not null default 0, 
// 	primary key(session_id)
// )charset=utf8 engine=myisam;

function userSessionBegin() {
	echo '<br>Begin<br>';
	//初始化数据库服务器连接
	$link = mysql_connect('127.0.0.1:3306', 'root', '1234abcd');
	mysql_query('set names utf8');
	mysql_query('use `php34`');
}
function userSessionEnd() {
	echo '<br>End<br>';
	return true;
}
/**
 * 读操作
 * 执行时机：	session机制开启程中执行
 * 工作：		从当前session数据区读取内容
 * @param $sess_id string
 * @return string
 */
function userSessionRead($sess_id) {
	echo '<br>Read<br>';
	//查询
	$sql = "SELECT session_content FROM `session` WHERE session_id='$sess_id'";
	$result = mysql_query($sql);
	if ($row = mysql_fetch_assoc($result)) {
		return $row['session_content'];
	} else {
		//没有找到，返回空字符串
		return '';
	}
}
/**
 * 写操作
 * 执行时机：	脚本周期结束时，PHP在整理收尾时
 * 工作：		将当前脚本处理好的session数据，持久化存储到数据库中！
 * @param $sess_id string
 * @param $sess_content string 序列化好的session内容字符串
 * @return bool
 */
function userSessionWrite($sess_id, $sess_content) {
	echo '<br>Write<br>';
	// 完成写
	$sql = "REPLACE INTO `session` VALUES ('$sess_id', '$sess_content', unix_timestamp())";
	// $sql = "INSERT INTO `session` VALUES ('$sess_id', '$sess_content') ON DUPLICATE KEY UPDATE session_content='$sess_content', last_time=unix_timestamp()"
	return mysql_query($sql);
}
/**
 * 删除操作
 * 执行时机：	调用了session_destroy()销毁session过程中被调用
 * 工作：		删除当前session的数据区（记录）
 * @param $sess_id string
 * @return bool
 */
function userSessionDelete($sess_id) {
	echo '<br>Delete<br>';
	//删除
	$sql = "DELETE FROM `session` WHERE session_id='$sess_id'";
	return mysql_query($sql);
}
/**
 * 垃圾回收操作
 * 执行时机：	开启session机制时，有概率的执行
 * 工作：		删除那些过期的session数据区
 * @param $max_lifetime
 * @return bool
 */
function userSessionGC($max_lifetime) {
	echo '<br>GC<br>';
	//删除
	$sql = "DELETE FROM `session` WHERE last_time<unix_timestamp()-$max_lifetime";
	return mysql_query($sql);
}

// 设置
session_set_save_handler(
	'userSessionBegin',
	'userSessionEnd',
	'userSessionRead',
	'userSessionWrite',
	'userSessionDelete',
	'userSessionGC'
	);
ini_set('session.save_handler', 'user');