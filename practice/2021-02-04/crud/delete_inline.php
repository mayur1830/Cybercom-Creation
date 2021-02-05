<?php
$stu_id = $_GET['id'];

$conn = mysqli_connect("localhost", "root", "", "crud") or die("connection failed");
$sql = "DELETE FROM STUDENT where sid=$stu_id";
$result = mysqli_query($conn, $sql) or die("unsuccessful");
header("location:home.php");
mysqli_close($conn);
