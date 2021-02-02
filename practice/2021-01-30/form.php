<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form</title>
</head>

<body>
    <?php
    $nameErr = $emailErr = $genderErr = $websiteErr = "";
    $name = $email = $gender = $classes = $time = $subject = "";
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($_POST["name"])) {
            $nameErr = "Name is required";
        } else {
            $name = test_input($_POST["name"]);
        }
        if (empty($_POST["email"])) {
            $emailErr = "Email is required";
        } else {
            $email = test_input($_POST["email"]);

            // check if e-mail address is well-formed
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $emailErr = "Invalid email format";
            }
        }
        if (empty($_POST["time"])) {
            $time = "";
        } else {
            $time = test_input($_POST["time"]);
        }
        if (empty($_POST["classes"])) {
            $classes = "";
        } else {
            $classes = test_input($_POST["classes"]);
        }
        if (empty($_POST["gender"])) {
            $genderErr = "Gender is required";
        } else {
            $gender = test_input($_POST["gender"]);
        }
        if (empty($_POST["subject"])) {
            $subjectErr = "You must select 1 or more";
        } else {
            $subject = $_POST["subject"];
        }
    }
    function test_input($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    ?>
    <div class="user_form">
        <h1>Registration Form</h1>
        <p><span class="error">* Required Field</span></p>
        <form action="" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <label for="Student">Name:</label>
            <input name="name" />
            <span class="error">*<?php echo $nameErr; ?></span>
            <br><br>
            <label for="email">Email:</label>
            <input type="email" name="email" required>
            <span class="error">*<?php echo $emailErr; ?></span>
            <br><br>
            <label for="time">Time:&nbsp;</label>
            <input type="time" name="time">
            <br><br>
            <label for="classes">Classes:</label>
            <textarea name="classes" id="classes" cols="28" rows="5"></textarea>
            <br>
            <br>
            <label for="gender">Gender:</label>
            <input type="radio" name="gender" value="female">Female
            <input type="radio" name="gender" value="male">Male
            <span class="error">* <?php echo $genderErr; ?></span>
            <br><br>
            <label for="select">Select:</label>
            <select name="subject[]" size="4" multiple>
                <option value="Android">Android</option>
                <option value="Java">Java</option>
                <option value="C#">C#</option>
                <option value="Data Base">Data Base</option>
                <option value="Hadoop">Hadoop</option>
                <option value="VB script">VB script</option>
            </select>
            <br>
            <br>
            <label for="agree">Agree:</label>
            <input type="checkbox" name="checked" value="1">
            <?php if (!isset($_POST['checked'])) { ?>
                <span class="error">* <?php echo "You must agree to terms"; ?></span>
            <?php } ?>
            <br>
            <br>
            <input type="submit" name="submit" value="Submit">
        </form>
    </div>
    <?php
    if (isset($_POST['submit'])) {

        echo "<h2>Your given values are as :</h2>";
        echo ("<p>Your name is $name</p>");
        echo ("<p> your email address is $email</p>");
        echo ("<p>Your class time at $time</p>");
        echo ("<p>your class info $classes </p>");
        echo ("<p>your gender is $gender</p>");

        for ($i = 0; $i < count($subject); $i++) {
            echo ($subject[$i] . " ");
        }
    }
    ?>
</body>

</html>