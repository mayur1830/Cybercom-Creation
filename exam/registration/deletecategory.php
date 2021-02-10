<?php
$id = $_GET['id'];

$conn = mysqli_connect("localhost", "root", "", "cybercom") or die("connection failed");
$sql = "DELETE FROM category where id=$id";
$result = mysqli_query($conn, $sql) or die("unsuccessful");
header("location:category.php");
mysqli_close($conn);
