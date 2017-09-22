use my_test;

--实际使用时去掉注释请
create table if not exists user_list(
	id int auto_increment key,
	`user` varchar(30) unique,
	`password` char(32) not null, /*考虑到加密后的长度*/
	age tinyint unsigned not null,
	degree enum('高中','大专','本科','研究生'),
	hobby set('排球','篮球','足球','棒球','乒乓球'),
	`from` enum('东北','华北','西北','华东','华南','西南','西西'),
	reg_time datetime not null

);

