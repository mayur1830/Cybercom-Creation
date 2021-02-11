<?php
// define variables and set to empty values



$nameErr = $emailErr = $titleErr = $dateErr = $phoneErr =  "";
$name = $email = $phone  = $title = $date = "";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
    if (empty($_POST["name"])) {
        $nameErr = "Name can not be blank";
    } else {
        $name = test_input($_POST["name"]);
    }
    if (empty($_POST["email"])) {
        $emailErr = "Email can not be blank";
    } else {
        $email = test_input($_POST["email"]);

        // check if e-mail address is well-formed
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "* Invalid email format";
        }
    }
    if (empty($_POST["phone"])) {
        $phoneErr = "Phone number can not be blank";
    } else if ((strlen((string)test_input($_POST["phone"]))) != 10) {
        $phoneErr = "* Phone Number is Not Valid";
    } else {
        $phone = test_input($_POST["phone"]);
    }
    if (empty($_POST["title"])) {
        $titleErr = "Title can not be blank";
    } else {
        $title = test_input($_POST["title"]);
    }
    if (empty($_POST["date"])) {
        $dateErr = "Date and Time can not be blank";
    } else {
        $date = test_input($_POST["date"]);
    }
}

function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
