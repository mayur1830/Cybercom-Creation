<?php 
$a=10; //global variable
function test(){
    global $a;
    $b=10; //local variable
    echo $a+$b;
}
test();
?>
