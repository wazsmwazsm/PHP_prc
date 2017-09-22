<?php

class A{}
class B extends A{}

$o1 = new A();
$o2 = new B();

$s1 = $o1 instanceOf A;
$s2 = $o1 instanceOf B;
var_dump($s1,$s2);

echo "<hr />";

$s3 = $o2 instanceOf B;

//下级是某个类的对象，则它也是上级类的对象
$s4 = $o2 instanceOf A;

var_dump($s3,$s4);

echo "<hr />";

?>