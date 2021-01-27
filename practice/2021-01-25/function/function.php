<?php
//normal function
function hello(){
    echo"hello";
}
hello();


//with argument
function sum($a,$b){
    echo $a+$b;
}
sum(4,5);
//default parameter and return value
function add($a=3,$b=4){
    return $a+$b;
}
echo (add(6));
//die and exit
function my_die(){
    echo 'hello';
    echo "world";
    die(); //we can use exit also here. 
    echo 'mayur';
}
my_die();
?>