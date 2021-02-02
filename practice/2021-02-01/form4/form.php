<?php
if (isset($_POST["submit"])) {
    echo "<h2>Your given values are as :</h2>";
    echo ("Your name is" . " " . $_POST['name']) . "<br>";
    echo ("Your email is" . " " . $_POST['email']) . "<br>";
    echo ("Your subject is" . " " . $_POST['subject']) . "<br>";
    echo ("Your message is" . " " . $_POST['message']) . "<br>";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>form</title>
</head>

<body>
    <div>
        <form name="myForm" id="myForm" action="form.php" method="post" onsubmit="return (validate())">
            <div id="heading">
                <h1>Contact US!</h1>

            </div>
            <br>
            <div>
                <input type="text" name="name" id="name" placeholder="name">
            </div>
            <br><br>
            <div>
                <input type="email" name="email" id="email" placeholder="email">
            </div>
            <br><br>
            <div>
                <input type="text" name="subject" id="subject" placeholder="subject">
            </div>
            <br><br>
            <div>
                <textarea name="message" id="message" cols="30" rows="5">Message</textarea>
            </div>
            <br><br>
            <div>
                <input type="submit" value="Send Message" name="submit" id="submit">
            </div>

        </form>
    </div>
</body>

</html>