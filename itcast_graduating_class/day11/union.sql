/* 联合查询，字段数一致，纵向堆叠, 有点像追加记录 */
/* 联合查询默认会消除重复项，想不消除要明确写all */
/* 查询结果的字段以第一个语句为准 */
use my_test;

select id,f1,f2 from join1
union
select id2,c1,c2 from join2;

/* 进行整体排序的话要把select语句加括号 */
(select id,f1,f2 from join1)
union
(select id2,c1,c2 from join2)
order by f1 desc
limit 0,4;









