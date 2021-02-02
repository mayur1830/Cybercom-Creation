<!-- we can store information on user's machine and get the information
1)Create Cookie
=>setcookie(name,value,expire,path,domain,secure,httponly);
secure=>true,false if https then true else false;
httponly=>true,false if true then we can access only server side else we can access server as well as local server
2)view Cookie
=>$_Cookie[name];

 -->
 <?php
$cookie_name = 'user';
$cookie_value = 'mayur';
setcookie($cookie_name, $cookie_value, time() + (60), "/", "");
//setcookie($cookie_name, $cookie_value, time() - (60), "/", ""); delete

?>
 <!DOCTYPE html>
 <html lang="en">
 <head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Cookie</title>
 </head>
 <body>
 <?php
if (isset($_COOKIE[$cookie_name])) {
    echo "hello" . $_COOKIE[$cookie_name];
} else {
    echo 'please set cookie';
}
?>
 </body>
 </html>