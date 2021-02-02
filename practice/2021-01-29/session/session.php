<!-- 1)we can store temporary  data on server is called session
  2) use login & logout
  -----------------
  step-1)session_start();
  step-2)$_SESSION[name]=value;==>se session value
  step-3)echo $_SESSION[name];==>get session value

  Delete Session
  step-1)session_unset(); //remove all session variable
  step-2)session_distroy(); //it will remove different session on server

  -->
<?php
session_start();
$_SESSION['user_name'];
echo 'Session variable is Set' . '<br>';
?>

