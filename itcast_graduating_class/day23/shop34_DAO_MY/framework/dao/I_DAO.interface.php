<?php

//接口的目的就是统一操作，屏蔽不同的实现部分
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

//对所有用到DAO的模型进行接口限制，比如model类和sessionDB类
//限制他们必须实现一个检测数据库配置的方法

//注意：所有接口中的方法应该是public(官方规定),public可以省略
//因为作为一个规范的话，可能有很多类去实现接口
//而接口中的方法是都要去实现的，多为类、对象外部调用
//如果声明为protected和private是没有意义的,当然也是会报错的
//protected可以用抽象类中的抽象方法去限定

//其实这里用抽象类限定更好，应为_checkDB虽然都要用，但是不需要被外部调用
//或者直接定义一个DAO类来统一处理所有用到DAO的模型
interface I_DAO_CHECK {
	public function _checkDB(); 

}