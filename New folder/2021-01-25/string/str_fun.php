<?php
$x="hello world";
echo (str_word_count($x));
print_r(str_word_count($x,1)); 
echo "<br>";
print_r(str_word_count($x,2)); 
//str_suffle(string)
echo (str_shuffle($x));
//substring
echo "<br>"; 
echo (substr($x,0,3))."<br>";
//strrev()
echo (strrev($x));
$y='this is a <img src="img.jpg"> string';
echo htmlentities($y);

?>