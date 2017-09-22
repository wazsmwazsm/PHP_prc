<?php


//DAO层操作接口

interface I_DAO{
	public static function getInstance($config);
	public  function query($sql);
	public  function getAll();
	public  function getRow();
	public  function getOne();
	public  function escapeString();

}


