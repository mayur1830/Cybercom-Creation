<?php
//arithmetic
$a=10;
$b=20;
echo $a+$b."<br>"; //addition;
echo $a-$b."<br>"; //substratcion;
echo $a*$b."<br>"; //multiplication;
echo $a/$b."<br>"; //division;
echo $a%$b."<br>"; //modulo;
$a++;
echo $a."<br>";//postfix increment;
$a--;
echo $a."<br>";//postfix decerement
++$a;
echo $a."<br>";//prefix increment;
--$a;
echo $a."<br>";//prefix decerement
//assignment
$a=200;
$b=100;
$a=$b;
echo $a."<br>";
$a+=$b;
echo $a."<br>";
$a-=$b;
echo $a."<br>"; 
$a*=$b;
echo $a."<br>";
$a/=$b;
echo $a."<br>";
$a%=$b;
echo $a."<br>";
$a**=$b;
echo $a."<br>";
//relational operator
$a=10;
$b=20;
echo $a>$b."<br>";
echo $a<$b."<br>";
echo $a>=$b."<br>";
echo $a<=$b."<br>";
echo $a==$b."<br>";
echo $a<>$b."<br>";
echo $a===$b."<br>";
echo $a!==$b."<br>";
echo $a<=>$b."<br>";//spaceship operator -1 0 1 
//ternary
$a=10;
$b=20;
$result=($a>$b) ? 'a is greater than b':'b is greater than a';
echo $result;

?>
