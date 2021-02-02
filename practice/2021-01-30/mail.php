<?php

//mail(to,subject,message,headers)
//to=receiver
//subject=subject-of-mail
//message=message
//headers=from-sender-cc-and-bcc
$to="mayurchavda18300@gmail.com";
$subject="Test mail";
$message="Hello! How Are You?";
$from="mayurchavda1379@gmail.com";
$headers="From:$from";
mail($to,$subject,$message,$h);
echo 'Mail Sent';
