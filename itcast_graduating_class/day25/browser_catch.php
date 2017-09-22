<?php

//互联网时间使用格林威治时间
//控制缓存Expires:有效期，时间点，GMT时间
header('Expires: '. gmdate('D, d M Y H:i:s',time()+5) . ' GMT');
echo date('H:i:s');

?>
<hr>
<a href="browser_catch.php">SELF</a>






