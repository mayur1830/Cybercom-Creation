<?php
$a=10;
$b=20;
$c=30;
if(
    $a>$b
    ){
    echo 'a is greater than b';
}else{
    echo 'b is greater than a';
}
//if elseif 
if(
    $a>$b && $a>$c
)
{
    echo 'a is greater number';
}elseif(
    $b>$a && $b>$c
)
{
    echo 'b is greater number';
}
else{
    echo 'c is greater number';
}
?>
