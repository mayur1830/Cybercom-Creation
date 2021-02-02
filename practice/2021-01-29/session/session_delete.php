<?php
session_start();
session_unset();
session_destroy();
echo 'Session Destroyed';
//echo $_SESSION['user_name'];
