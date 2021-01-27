<?php 
//pass by value
function pass_value($a){
    $a="hello";
}
$str="mayur";
pass_value($str);
echo $str;
//pass by reference
function pass_reference(&$a){
    $a="gaurang";
}
pass_reference($str);
echo $str;
?>