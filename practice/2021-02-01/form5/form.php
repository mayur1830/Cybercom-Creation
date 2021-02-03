<?php
include("form_process.php");
if (isset($_POST['submit'])) {




    if ((!empty($name) && !empty($email) && !empty($phone) && !empty($password) && !empty($cpassword))) {
        $servername = "localhost";
        $username = "root";
        $pass = "";
        $database = "mayur";
        $conn = mysqli_connect($servername, $username, $pass, $database);
        if (!$conn) {
            die("sorry" . mysqli_connect_error());
        } else {
            $sql = "INSERT INTO `data` (`name`, `email`, `phone`, `password`, `cpassword`, `date`) VALUES ('$name','$email', '$phone', '$password', '$cpassword', current_timestamp());";
            $result = mysqli_query($conn, $sql);
            if ($result) {
                echo '<script>alert("Form Submitted Successfully")</script>';
            } else {
                echo '<script>alert("There is some issue with system")</script>';
            }
        }

        echo "<div id='print'>";

        echo "<h1>Your given values are as :</h1>" . "<br>";
        echo "<hr>" . "<br>";

        echo ("<b><p>Your name is</b> $name</p>" . "<br>");
        echo ("<b><p> your email address is</b> $email</p>" . "<br>");
        echo ("<b><p>Your phone number</b> $phone</p>" . "<br>");
        echo ("<b><p>your password</b> $password </p>" . "<br>");
        echo ("<b><p>your confirm password</b> $cpassword</p>" . "<br>");
        echo "</div>";
        $name = $email = $phone = $password = $cpassword = "";
    }
}
?>
<?php


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w==" crossorigin="anonymous" />
</head>

<body>
    <div class="container">
        <div class="header">
            <h2>Registration Form</h2>

        </div>

        <form id="form" class="form" name="form" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" onsubmit="return validate()">
            <p><span>* Required Fields</span></p>
            <br>
            <div class="form-control">
                <label for="firstname">Name <span class="star">*</span></label>
                <input type="text" name="name" id="name" placeholder="Enter Your Name" value="<?php echo $name; ?>">
                <i class="fas fa-check-circle"></i>
                <i class="fas fa-exclamation-circle"></i>
                <small>Error Message</small>
                <span class="error"><?php echo $nameErr; ?></span>
            </div>
            <div class="form-control">
                <label for="">Email<span class="star">*</span></label>
                <input type="email" name="email" id="email" placeholder="Enter Your Email" value="<?php echo $email; ?>">
                <i class="fas fa-check-circle"></i>
                <i class="fas fa-exclamation-circle"></i>
                <small>Error Message</small>
                <span class="error"><?php echo $emailErr; ?></span>
            </div>
            <div class="form-control">
                <label for="">Phone Number<span class="star">*</span></label>
                <input type="text" name="phone" id="phone" placeholder="Enter Your Phone Number" value="<?php echo $phone; ?>">
                <i class="fas fa-check-circle"></i>
                <i class="fas fa-exclamation-circle"></i>
                <small>Error Message</small>
                <span class="error"><?php echo $phoneErr; ?></span>
            </div>
            <div class="form-control ">
                <label for="">Password<span class="star">*</span></label>
                <input type="password" name="password" id="password" placeholder="Enter Your Password" value="<?php echo $password; ?>">
                <i class="fas fa-check-circle"></i>
                <i class="fas fa-exclamation-circle"></i>
                <small>Error Message</small>
                <span class="error"><?php echo $passwordErr; ?></span>
            </div>
            <div class="form-control ">
                <label for="">Confirm Password<span class="star">*</span></label>
                <input type="password" name="cpassword" id="cpassword" placeholder="Enter Your Confirm Password" value="<?php echo $cpassword; ?>">
                <i class="fas fa-check-circle"></i>
                <i class="fas fa-exclamation-circle"></i>
                <small>Error Message</small>
                <span class="error"><?php echo $cpasswordErr; ?></span>
            </div>
            <div class="form-control">
                <input type="submit" value="Submit" name="submit" id="submit" class="btn">
                <!-- <button name="submit" id="submit" class="btn">Submit</button> -->
            </div>


        </form>

    </div>


    <script src="validation.js"></script>
</body>

</html>