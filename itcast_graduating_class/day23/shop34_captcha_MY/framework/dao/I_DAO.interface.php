<?php


//DAO层操作接口,为了实现PDO和mysql两种操作可以统一
//实现无缝切换，屏蔽不同实现方法的差异

interface I_DAO{
	//规定数据库层要实现的统一的方法，不管用什么数据库
	public static function getInstance($config);
	public  function query($sql);
	public  function getAll($sql);
	public  function getRow($sql);
	public  function getOne($sql);
	public  function escapeString($sql);

}


