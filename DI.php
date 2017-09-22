<?php

namespace Database;
use ReflectionMethod;
use ReflectionClass;

class Database
{
    public function __construct(AA $aa)
    {
        $aa->test();
    }

    public function test (MysqlAdapter $mysql, PostgreSQLAdapter $postgreSQL)
    {
        $mysql->test();
        $postgreSQL->test();
    }

}

class AA
{
    public function test ()
    {
        echo "I am AA test\n";
    }
}

class MysqlAdapter
{
    public function test ()
    {
        echo "I am MysqlAdapter test\n";
    }
}

class PostgreSQLAdapter
{
    public function test ()
    {
        echo "I am PostgreSQLAdapter test\n";
    }
}

class DI
{
    public static function run($className, $method)
    {
        // construct Dependency injection
        $reflector = new ReflectionClass($className);
        $constructor = $reflector->getConstructor();
        $params = [];
        foreach ($constructor->getParameters() as $key => $parameter) {
            $class = $parameter->getClass();
            if ($class) {
                $params[] = new $class->name();
            }
        }

        if(version_compare(PHP_VERSION, '5.6.0', '>=')){
            $instance = new $className(...$params);
        } else {
            $instance = $reflector->newInstanceArgs($params);
        }

        // method Dependency injection
        if( ! method_exists($instance, $method)) {
            return NULL;
        }

        $params = [];
        $reflectorMethod = $reflector->getMethod($method);
        foreach ($reflectorMethod->getParameters() as $key => $parameter) {
            $class = $parameter->getClass();
            if ($class) {
                $params[] = new $class->name();
            }

        }

        call_user_func_array([$instance, $method], $params);
    }
}

DI::run('Database\Database', 'test');
