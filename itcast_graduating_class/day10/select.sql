/* 字符串连接 concat */

select id, concat(f1,'--', f2) from tab4;


/* select可以接受数值和函数直接显示，但字段名必须要加from表 */
/* 不是表中的数据会每行重复显示 */
select *, id*10 , f1, 8*2 as f5 , now() as timer from tab4;

/* distinct 去除重复部分 */
select distinct(id) from tab1;

/* distinct 同时作用多个字段 */
select distinct id,f1,f2  from tab1;
/* 注意，这样也是作用多个字段 */
select distinct (id),f1,f2  from tab1;

use saixinjituan;

select id, title  from 007_news where id >= 20 and id <= 80;
/* 同意语法 */
select id, title  from 007_news where id between 20 and 80;

/* in语法 */
select id, title  from 007_news where id in(20,31,80,66);

/* 判断控制不能用=要用is */

select id, title from 007_news where content is not null ;

/* %:代表任意个数的任意字符 
   _：代表一个任意字符
   包含这些特殊字符是用反斜杠转移
 */
select id, title from 007_news 
where content like  '%今天%' and content like  '%\_%';


/* 分组 */
/* 分组后其他字段就无意义了，能取得的是一些整体的数据 */
/* 分组查询都依赖聚合函数
   如：count(),max(),min(),avg(),sum()总和,
 */
select count(id), source from 007_news  group by source;
select count(id), cat from 007_news  group by cat desc;

select cat, count(id), max(id), min(id) , avg(id) from 007_news  group by cat;


/* 二次分组，前一次分组结果再分组,同时满足分组的数据会返回 */
select cat,source, count(id) from 007_news  group by cat, source;

/* having子句 和where一个概念，用于group by 
   可以使用:聚合函数()　判断符号　值 这种形式*/
   
select count(id) as num, cat from 007_news  group by cat having num < 60; 
   
   
   
   