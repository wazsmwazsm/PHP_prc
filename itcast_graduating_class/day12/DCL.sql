--添加用户
create user qqq@192.168.1.102 identified by 'wzdanzsm';
--修改密码
set password for 'qqq'@'192.168.1.102'=password('123456');
--删除用户
drop user qqq@192.168.1.102;

--增加权限
grant all privileges on *.* to  qqq@192.168.1.102 identified by 'wzdanzsm';

--取消权限
revoke all on *.* from qqq@192.168.1.102;



