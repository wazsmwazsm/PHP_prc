create table tab1(id int, f1 float, f2 varchar(20) , f3 datetime);

create table tab2(
	id int auto_increment primary key, /* �ֶ�����Ϊ�����൱�ڼ���һ���������� */
	f1 float, 
	f2 int);

create table tab3(
	id int auto_increment  not null,
	f1 float unique comment '����ֶ�������Ψһ��Ŷ',
	f2 decimal(20,5) default 12.4,
	f4 varchar(20) comment '����һ��ע��',
	primary key(id), /* �൱�ڼ�һ���������ֶ����Ա�����ͬ */
	unique key(f1), /* �൱��д��f1�� */
	key(f2)
); 


create table tab4(
	id int auto_increment  not null,
	f1 float unique comment '����ֶ�������Ψһ��Ŷ',
	f2 decimal(20,5) default 12.4,
	f4 varchar(20) comment '����һ��ע��',
	id2 int, /*��ͼ��Ϊmy_test�����*/
	primary key(id), /* ����Լ��Ҳ������ */
	unique key(f1), /* ����Լ��Ҳ������ */
	key(f2), /* ֻ������ */
	foreign key (id2) references my_test(id)
	
	
)
comment = '����һ����������ۺ�',
engine = MyIsam,
auto_increment = 1000
; 

create table tab5 like tab3;

/* ������ͼ, ͨ������һ����ѯ������ */
create view view1 as select * from my_test;

select * from view1;



