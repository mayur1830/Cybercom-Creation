<?php
$string = "mayur";
//strlrn():length of string
echo strlen($string) . '<br>';
//strtolower():lower case
echo strtolower($string) . '<br>';
//strtouper():uppercase
echo strtoupper($string) . '<br>';
//strpos(string,find,start):position of string first occurrence
echo strpos($string, 'a') . '<br>';
//substr_replace(string,replacement,start_position,length):>replace part of string with another string
$x = "hello world";
echo substr_replace($x, 'mayur', 6, 5) . '<br>';
//str_replace(find,replace,string)
$y = "hello world";
echo str_replace('w', "", $y) . '<br>';
$find = array('is', 'string', 'example');
$replace = array('IS', 'STRING', 'EXAMPLE');
$str = "this is a string and is an example";
echo str_replace($find, $replace, $str) . '<br>';
