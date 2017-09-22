--创建函数
delimiter $

create  function getPingfanghe1(x float, y float)
returns float
begin
	set @result = x*x + y*y;
	return @result;
end;
$
delimiter ;

--换一个做法
delimiter $

create  function getPingfanghe(x float, y float)
returns float
begin
	declare result float default 0;
	set result = x*x + y*y;
	return result;
end;
$
delimiter ;

--创建过程
delimiter $

create procedure pro1(name varchar(20), gender char(4), class_id int)
begin 
insert into stu (name,gender,class_id) values (name,gender,class_id);
end;

$
delimiter ;
call pro1('秦琼','男',3);

--双向数据作用的存储过程,默认是in
--对输出的形参来说，传参必须是一个变量 
delimiter $

create procedure getXiebian(z1 float, z2 float, out xiebian float)
begin
	set @pingfanghe = getPingfanghe(z1,z2);
	set xiebian = pow(@pingfanghe, 0.5);
end;
$
delimiter ;
call getXiebian(3,4,@a);
select @a;

--带有select语句的procedure
delimiter $

create procedure getTables()
begin
	select * from stu inner join stu_kecheng as sk on sk.stu_id=stu.id inner join kecheng as kc on kc.id = sk.kecheng_id;
end;
$
delimiter ;






--触发器,触发器不隶属于数据库而隶属于表
--new在触发器中代表刚刚插入的数据行，在insert时有效
--old代表旧的一条数据，在update和delete时有效
delimiter $

create trigger getSubData after insert on stu for each row 
begin
	set @id = new.id; 
	set @name = new.name;
	set @gender = new.gender;
	insert into stu_sub (id,name,gender) values (@id, @name,@gender);
end;
$
delimiter ;
--建一个表用来触发器复制数据
CREATE TABLE `stu_sub` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) DEFAULT NULL,
  `gender` enum('男','女') DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB CHARSET=utf8;

--直接用这样更好，免得会话变量被缓存
delimiter $

create trigger getSubData after insert on stu for each row 
begin
	insert into stu_sub (id,name,gender) values (new.id, new.name,new.gender);
end;
$
delimiter ;

