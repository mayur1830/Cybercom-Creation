<?php 
for($i=0;$i<5;$i++){
    if($i==2){
        goto abc;
    }
    echo $i."<br>";
}
echo 'hello';
abc:
echo 'after label';
?>