/* 添加表的三种形式 */
insert into tab4 (f1,f2,f4,id2) values (1.52,32.2,'hello',3);

insert into tab4 (f2,f4,id2) select f2,f4,id2 from tab4;
/* 一般要加条件，不然所有都插入到表中 */
insert into tab4 (f2,f4,id2) select f2,f4,id2 from tab4 where id = 3;

/* 复制表的推荐做法 */
create table tab8 like tab4;
insert into tab8 select * from tab4;

/* 复制表不太推荐做法，会丢失查中间数据 */

create table tab9 select * from tab4;