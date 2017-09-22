create database if not exists my_test;
use my_test;

create table my_test(
id int(4) primary key not null auto_increment,
enum_num enum('s','d','f','g'),
set_num set('s','d','f','g')

);

insert into my_test (enum_num, set_num) values ('s', 'f');
insert into my_test (enum_num, set_num) values (2, 2);
insert into my_test (enum_num, set_num) values ('f', 7);
insert into my_test (enum_num, set_num) values ('3', '3');

