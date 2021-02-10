<?php
session_start();

// initializing variables
$prefix = $firstname = $lastname = $email = $mobile = $password_1 = $password_2 = $information = $tc = "";
$title = $content = $url = $metatitle = $parentcategory = $image = "";
$password = "";
$errors = array();

// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'cybercom');


// REGISTER USER
if (isset($_POST['reg_user'])) {
    // receive all input values from the form

    $prefix = mysqli_real_escape_string($db, $_POST['prefix']);
    $firstname = mysqli_real_escape_string($db, $_POST['firstname']);
    $lastname = mysqli_real_escape_string($db, $_POST['lastname']);
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $mobile = mysqli_real_escape_string($db, $_POST['mobilenumber']);
    $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
    $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);
    $information = mysqli_real_escape_string($db, $_POST['information']);
    if (isset($_POST['tc'])) {
        $tc = true;
    }


    // form validation: ensure that the form is correctly filled ...
    // by adding (array_push()) corresponding error unto $errors array
    if (empty($prefix)) {
        array_push($errors, "Please select Prefix");
    }
    if (empty($firstname)) {
        array_push($errors, "Firstname is required");
    }
    if (empty($lastname)) {
        array_push($errors, "Lastname is required");
    }
    if (empty($email)) {
        array_push($errors, "Email is required");
    }
    if (empty($mobile)) {
        array_push($errors, "Mobile Number is required");
    }
    if (empty($password_1)) {
        array_push($errors, "Password is required");
    }

    if ($password_1 != $password_2) {
        array_push($errors, "The two passwords do not match");
    }
    if (empty($information)) {
        array_push($errors, "Information is required");
    }
    if (empty($tc)) {
        array_push($errors, "Please Check Checkbox");
    }

    // first check the database to make sure 
    // a user does not already exist with the same username and/or email
    $user_check_query = "SELECT * FROM user WHERE email='$email' LIMIT 1";
    $result = mysqli_query($db, $user_check_query);
    $user = mysqli_fetch_assoc($result);

    if ($user) { // if user exists


        if ($user['email'] === $email) {
            array_push($errors, "email already exists");
        }
    }

    // Finally, register user if there are no errors in the form
    if (count($errors) == 0) {
        date_default_timezone_set("Asia/Calcutta");
        $t = date('d-m-Y H:i:s');
        $password = md5($password_1); //encrypt the password before saving in the database
        $query = "INSERT INTO `user` (`prefix`, `firstname`, `lastname`, `email`, `mobile`, `password`, `information`, `lastlogin`, `created`, `updated`) VALUES ('$prefix', '$firstname', '$lastname', '$email', '$mobile', '$password','$information', '$t', current_timestamp(), '$t');";
        mysqli_query($db, $query);
        $_SESSION['email'] = $email;
        $_SESSION['success'] = "You are now logged in";
        header('location: index.php');
    }
}
if (isset($_POST['login_user'])) {
    date_default_timezone_set("Asia/Calcutta");
    $t = date('d-m-Y H:i:s');
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $password = mysqli_real_escape_string($db, $_POST['password']);

    if (empty($email)) {
        array_push($errors, "Email is required");
    }
    if (empty($password)) {
        array_push($errors, "Password is required");
    }

    if (count($errors) == 0) {


        $password = md5($password);
        $query = "SELECT * FROM user WHERE email='$email' AND password='$password'";

        $results = mysqli_query($db, $query);
        if (mysqli_num_rows($results) == 1) {
            date_default_timezone_set("Asia/Calcutta");
            $tu = date('d-m-Y H:i:s');
            $query1 = "UPDATE user SET `lastlogin`='$tu' WHERE email='$email'";
            $results1 = mysqli_query($db, $query1);
            $_SESSION['email'] = $email;
            $_SESSION['success'] = "You are now logged in";
            header('location: blogpost.php');
        } else {
            array_push($errors, "Wrong username/password combination");
        }
    }
}
//category
