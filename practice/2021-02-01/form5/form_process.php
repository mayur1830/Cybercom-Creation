<?php
// define variables and set to empty values
$nameErr = $emailErr = $phoneErr = $passwordErr = $cpasswordErr = "";
$name = $email = $phone = $password = $cpassword = "";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
    if (empty($_POST["name"])) {
        $nameErr = "* Name is required";
    } else {
        $name = test_input($_POST["name"]);
    }

    if (empty($_POST["email"])) {
        $emailErr = "* Email is required";
    } else {
        $email = test_input($_POST["email"]);

        // check if e-mail address is well-formed
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "* Invalid email format";
        }
    }
    if (empty($_POST["phone"])) {
        $phoneErr = "* Phone Number is required";
    } else if ((strlen((string)test_input($_POST["phone"]))) != 10) {
        $phoneErr = "* Phone Number is Not Valid";
    } else {
        $phone = test_input($_POST["phone"]);
    }
    if (empty($_POST["password"])) {
        $passwordErr = "* Password is required";
    } else {
        $password = test_input($_POST["password"]);
    }
    if (empty($_POST["cpassword"])) {
        $cpasswordErr = "* Confirm Password is required";
    } else if ($password !== test_input($_POST["cpassword"])) {
        $cpasswordErr = "* Password does not match";
    } else {
        $cpassword = test_input($_POST["cpassword"]);
    }
}

function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
