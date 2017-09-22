create table join1 (
	id int key, f1 varchar(10), f2 varchar(10)
);
create table join2 (
	id2 int key, c1 varchar(10), c2 varchar(10)
);

insert into join1(id,f1,f2) values (1,'a1','b1');

insert into join1(id,f1,f2) values (2,'a12','b3');

insert into join1(id,f1,f2) values (3,'a3','b3');

insert into join2(id2,c1,c2) values (11,'a1','b11');

insert into join2(id2,c1,c2) values (12,'a12','b12');

insert into join2(id2,c1,c2) values (13,'a13','b13');

/* 这样查询的话会每一个都重复N次  */
select * from join1, join2;

/* 连接查询,用来查询两个表的关联数据 */
/* 交叉连接(笛卡尔积) */

select * from join1 cross join join2;

/* 内连接,没有on就是交叉连接 */

select * from join1 as t1 inner join join2 as t2 on t1.f1 = t2.c1;

/* 左[外]连接，在内连接的基础上加入左边表中所有不符合的数据
   ,但相关右边表的不符合字段置为null
	left [outer] join*/
select t1.id,t2.id2, f1,f2, c1, c2 from join1 as t1 left join join2 as t2 on t1.f1 = t2.c1;

/* 右连接类似左连接 */
select * from join1 as t1 right join join2 as t2 on t1.f1 = t2.c1;

/* 全[外]连接，左右连接的合集(消除重复项) 
   但是mysql不认full关键字*/

select * from join1 full outer join join2 on join1.f1 = join2.c1;

/* 应用 */
use gouwu;
/* 显示sony 4G手机的详情信息 */
select t2.protype_name, t1.pro_name, t1.price from product as t1 inner join product_type as t2
on t1.protype_id = t2.protype_id
where pro_name like '%SONY%' and pro_name like '%4G手机%';

/* 找出所有T1中属于手机数码类的记录 */
select t1.* from product as t1 inner join product_type as t2
on t1.protype_id = t2.protype_id
where t2.protype_name = '手机数码';





