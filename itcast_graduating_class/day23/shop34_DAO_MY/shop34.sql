create database shop34 charset=utf8;

grant all privileges on shop34.* to 'shop34'@'%' identified by 'wzdanzsm'; 
use shop34;

--管理员表 
--表名 前缀+逻辑
create table p34_admin (
	admin_id int unsigned not null auto_increment,

	/* 认证相关 */
	admin_name varchar(32) not null default '' comment '管理员姓名',
	admin_pass char(32) not null default '' comment '密码，MD5加密的密码', 

	/* 权限 */
	role_id int unsigned not null default 0 comment '所属角色ID, RBAC',

	/*登陆相关信息*/
	/*inet_aton函数可以存储IPV4*/
	last_ip int unsigned not null default 0 comment '上次登陆IP', 
	last_time int comment '上次登陆时间', 

	/*管理员属性信息*/

	primary key(admin_id) 
) charset=utf8 engine=myisam;


insert into p34_admin values
	(23,'admin',md5('wzdanzsm'),0,0,0),
	(42,'qin',md5('wzdanzsm'),0,0,0),
	(45,'php34',md5('wzdanzsm'),0,0,0);

--session表
create table `p34_session` (
	session_id varchar(40) not null default '',
	session_content text,
	last_time int not null default 0, 
	primary key(session_id)
	)charset=utf8 engine=myisam;