<?php
// IOC 容器是一个特殊的工厂类，可以获取自动注入好依赖的实例

class Foo
{
    public $a = 1;

    public $b = 2;
}

class Bar
{
    public $a = 5;

    public $b = 6;

    public function __construct(Foo $foo)
    {
        $this->a = $foo->a + $this->a;
        $this->b = $foo->b + $this->b;
    }
}

class Foz
{
    public $a = 0;

    public $b = 0;

    public function __construct(Bar $bar)
    {
        $this->a = $bar->a;
        $this->b = $bar->b;
    }
}

// IOC 容器的实现
class IOCContainer
{
    // 获取自动依赖注入的实例
    public static function getInstance($class_name)
    {
        $reflector = new ReflectionClass($class_name);
        $constructor = $reflector->getConstructor();
        $di_params = [];
        if ($constructor) {
            foreach ($constructor->getParameters() as $param) {
                if ($class = $param->getClass()) {
                    $di_params[] = self::getInstance($class->name);
                }
            }
        }
        return $reflector->newInstanceArgs($di_params);
    }
}

$foz = IOCContainer::getInstance('Foz');

var_dump($foz->a, $foz->b);
