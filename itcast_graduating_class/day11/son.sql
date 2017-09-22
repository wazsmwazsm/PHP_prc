
/* 条件子查询 */

/* 找出所有大于平均价的商品 */
select * from product
where price < (select avg(price) from  product);


/* 使用in子查询(列子查询) */

select * from product 
where protype_id in (
select protype_id from product_type 
where protype_name like '%电%'
);

/* 使用any子查询(列子查询) any和some一样*/
/* = any() 相当于 in */
select * from product 
where protype_id = any(
select protype_id from product_type 
where protype_name like '%电%'
);


/* 使用all子查询(列子查询),其实也可以用max函数 */
select * from product
where price >= all(
select price from product
);

select * from product
where price = (
select max(price) from product
);


/* 使用exists子查询,如果查询有任何结果就返回true */
/* 找出在售商品包含的类别 */
select * from product_type where exists(
select * from product where product.protype_id = product_type.protype_id

);
/* 使用not exists子查询 */
/* 找出不在售商品包含的类别 */
select * from product_type where not exists(
select * from product where product.protype_id = product_type.protype_id

);



