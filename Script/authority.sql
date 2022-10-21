USE 12306system2;

-- 创建用户
create user 'u1'@'localhost' identified by '19281153';  

create user 'u2'@'localhost' identified by '19281153';  

create user 'u3'@'localhost' identified by '19281153';  

create user 'u4'@'localhost' identified by '19281153';  


-- 赋予表级属性
GRANT SELECT, INSERT, UPDATE, DELETE ON trains to 'u1'@'localhost';

revoke SELECT, INSERT, UPDATE, DELETE ON trains from 'u1'@'localhost';

GRANT SELECT, INSERT, UPDATE, DELETE ON trains to 'u2'@'localhost';

revoke SELECT, INSERT, UPDATE, DELETE ON trains from 'u2'@'localhost';

GRANT all privileges ON orders to 'u2'@'localhost';

revoke all privileges ON orders from 'u2'@'localhost';


-- 查看权限

show grants for'u1'@'localhost';
show grants for'u2'@'localhost';



GRANT SELECT(车次,发车时间) 
ON trains
TO 'u1'@'localhost';
 
GRANT insert(用户名,车次),update(车厢号),delete -- 不能加列 
ON table orders
TO 'u1'@'localhost';

revoke 'u1'@'localhost' from 'root'@'localhost';


-- 角色操作
CREATE  ROLE  R1;
GRANT SELECT,UPDATE,INSERT 
ON orders
TO R1;


-- 角色创建 
CREATE  ROLE  R2;
GRANT SELECT
ON trains
TO R2;

-- 激活Role
SET global activate_all_roles_on_login=ON;

GRANT R1,R2
TO 'u4'@'localhost';

show grants for 'u4'@'localhost';

REVOKE R1, R2  from 'u4'@'localhost';

show grants for 'u4'@'localhost';

REVOKE  R1,R2 
FROM root@localhost;

drop role R1,R2;

select * from trains;
