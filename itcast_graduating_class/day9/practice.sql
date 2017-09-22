create table tab1(id int, f1 float, f2 varchar(20) , f3 datetime);

create table tab2(
	id int auto_increment primary key, /* 字段属性为主键相当于加了一个主键索引 */
	f1 float, 
	f2 int);

create table tab3(
	id int auto_increment  not null,
	f1 float unique comment '这个字段内容是唯一的哦',
	f2 decimal(20,5) default 12.4,
	f4 varchar(20) comment '这是一个注释',
	primary key(id), /* 相当于加一个索引和字段属性本质相同 */
	unique key(f1), /* 相当于写在f1上 */
	key(f2)
); 


create table tab4(
	id int auto_increment  not null,
	f1 float unique comment '这个字段内容是唯一的哦',
	f2 decimal(20,5) default 12.4,
	f4 varchar(20) comment '这是一个注释',
	id2 int, /*意图作为my_test的外键*/
	primary key(id), /* 既是约束也是索引 */
	unique key(f1), /* 既是约束也是索引 */
	key(f2), /* 只是索引 */
	foreign key (id2) references my_test(id)
	
	
)
comment = '这是一个建表语句综合',
engine = MyIsam,
auto_increment = 1000
; 

create table tab5 like tab3;

/* 创建视图, 通常当做一个查询表来用 */
create view view1 as select * from my_test;

select * from view1;



