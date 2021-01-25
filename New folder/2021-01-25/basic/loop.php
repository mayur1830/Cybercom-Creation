<?php
//while
$a=5;
$i=0;
while($i<$a){
    echo 'I am in while'."<br>";
    $i++;
}
//for loop

for($i=0;$i<$a;$i++){
    echo 'i am in for loop'."<br>";
}
//do while
$i=0;
do{
    echo 'i am in do while loop'.'<br>';
    $i++;
}while($i<$a);
//nested loop
for($i=1;$i<=100;$i=$i+10){
    echo $i." ";
    for($j=1;$j<=9;$j++){
        echo $i+$j." ";
    }
    echo "<br>";
}
?>