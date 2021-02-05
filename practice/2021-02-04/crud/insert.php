<?php
// define variables and set to empty values
$nameErr = $addressErr = $selectErr = $phoneErr =  "";
$name = $address = $phone  = $select = "";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
    if (empty($_POST["name"])) {
        $nameErr = "* Name is required";
    } else {
        $name = test_input($_POST["name"]);
    }
    if (empty($_POST["address"])) {
        $addressErr = "* Address is required";
    } else {
        $address = test_input($_POST["address"]);
    }

    if ($_POST['class'] == "") {
        $selectErr = "* Select One Option";
    } else {
        $select = test_input($_POST['class']);
    }


    if (empty($_POST["phone"])) {
        $phoneErr = "* Phone Number is required";
    } else if ((strlen((string)test_input($_POST["phone"]))) != 10) {
        $phoneErr = "* Phone Number is Not Valid";
    } else {
        $phone = test_input($_POST["phone"]);
    }
}

function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if (!empty($name) && !empty($address) && !empty($phone) && !empty($select)) {
    $conn = mysqli_connect("localhost", "root", "", "crud") or die("connection failed");
    $sql = "INSERT INTO `student` ( `sname`, `saddress`, `sclass`, `sphone`) VALUES ('$name', '$address', '$select', '$phone');";
    $result = mysqli_query($conn, $sql) or die("unsuccessfil");
    mysqli_close($conn);
    header("location:home.php");
}
