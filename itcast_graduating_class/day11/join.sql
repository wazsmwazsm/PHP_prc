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

/* ������ѯ�Ļ���ÿһ�����ظ�N��  */
select * from join1, join2;

/* ���Ӳ�ѯ,������ѯ������Ĺ������� */
/* ��������(�ѿ�����) */

select * from join1 cross join join2;

/* ������,û��on���ǽ������� */

select * from join1 as t1 inner join join2 as t2 on t1.f1 = t2.c1;

/* ��[��]���ӣ��������ӵĻ����ϼ�����߱������в����ϵ�����
   ,������ұ߱�Ĳ������ֶ���Ϊnull
	left [outer] join*/
select t1.id,t2.id2, f1,f2, c1, c2 from join1 as t1 left join join2 as t2 on t1.f1 = t2.c1;

/* ���������������� */
select * from join1 as t1 right join join2 as t2 on t1.f1 = t2.c1;

/* ȫ[��]���ӣ��������ӵĺϼ�(�����ظ���) 
   ����mysql����full�ؼ���*/

select * from join1 full outer join join2 on join1.f1 = join2.c1;

/* Ӧ�� */
use gouwu;
/* ��ʾsony 4G�ֻ���������Ϣ */
select t2.protype_name, t1.pro_name, t1.price from product as t1 inner join product_type as t2
on t1.protype_id = t2.protype_id
where pro_name like '%SONY%' and pro_name like '%4G�ֻ�%';

/* �ҳ�����T1�������ֻ�������ļ�¼ */
select t1.* from product as t1 inner join product_type as t2
on t1.protype_id = t2.protype_id
where t2.protype_name = '�ֻ�����';





