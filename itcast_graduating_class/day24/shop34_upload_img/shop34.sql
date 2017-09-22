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

--商品表
create table p34_goods(
	goods_id int unsigned not null auto_increment,
	goods_name varchar(32) not null default '' comment '名称',
	shop_price decimal(10,2) not null default 0 comment '商品价格', /* 提高计算速度节省空间选择float*/
	--category_id int unsigned comment '当前商品所属的类型ID'，/*典型的多对一，在多的那一端建立关联字段*/
	--brand_id int unsigned comment '当前品牌所属的ID', /* 如果需要在数据库的层面，约束多对一的干系，需要增加外键玉树foreign key */
	goods_imgage varchar(255) not null default '' comment '商品图片地址',
	goods_imgage_org varchar(255) not null default '' comment '商品原图',
	goods_desc text comment '描述',
	goods_number int unsigned not null default 0 comment '库存',
	is_on_sale tinyint not null default 1 comment '上架状态', /*boolean: tinyint(1) 的别名,mysql没有bool类型*/
	goods_promote set('精品','新品','热销') not null default '' comment '商品的推荐属性集合',
	cteate_admin_id int unsigned not null default 0 comment '添加该商品的管理员',
	primary key(goods_id) /* 结尾不要加分号，错误*/


)charset=utf8,engine=myisam; /* tips:想起来linux的环境变量的赋值等号两边不要加空格 */


/* 插入集合时要按照字符串格插入 */
-- insert into p34_goods
-- (goods_promote)
-- values
-- (''),
-- ('新品'),
-- ('精品,热销'),
-- ('精品,新品,热销');

/* 虽然存储按照整型的位来存储，但是为了可读性不要这么做，mysql内部还是把set当作字符串类型的 */
-- insert into p34_goods
-- (goods_promote)
-- values
-- (0),(7);




create table p34_categroy(
	category_id int unsigned not null auto_increment,
	primary key (category_id);
);

create table p34_brand(
	brand_id int unsigned not null auto_increment,
	primary key (brand_id);
);