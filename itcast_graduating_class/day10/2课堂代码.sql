//插入语句：
insert into tab5 (f1,f2, f4, id2)values
	(1.23,12.3,'abded1',100),
	(1.33,22.3,'abded2',102),
	(1.43,42.3,'abded3',102)
	;

insert into tab5 (f1, id2)values(3.33, 33);

insert into tab5  (f1,f2, f4, id2) select f1,f2, f4, id2 from tab5 where id=1000;

//导入（载入）数据语句：
load data infile 'C:/itcast/mysql/datasource/学生表.txt'
into table `学生表`;

//删除语句：
delete from tab5 where id < 100;

//更新语句：

















