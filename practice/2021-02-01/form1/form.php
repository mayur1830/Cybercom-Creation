<?php
if (isset($_POST["submit"])) {
    echo "<h2>Your given values are as :</h2>";
    echo ("Your name is" . " " . $_POST['name']) . "<br>";
    echo ("Your Password is" . " " . $_POST['password']) . "<br>";
    echo ("Your Address is" . " " . $_POST['address']) . "<br>";
    echo ("Your Game is") . "<br>";
    if (!empty($_POST['game'])) {
        foreach ($_POST['game'] as $checked) {
            echo $checked . "</br>";
        }
    }
    echo "Your Gender is" . " " . $_POST['gender'] . "<br>";
    echo "Your  Age is in between" . " " . $_POST['age'] . "<br>";
    echo "Your File is" . " " . $_POST['files'] . "<br>";
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Form1</title>
</head>

<body>
    <form name="myForm" action="form.php" method="post" onsubmit="return (validate())">
        <table border="1px" width="30%" height="40%" align="center" cellspacing="2px" cellpadding="2px">
            <tr id="yellow">
                <th colspan="2">User Form</th>
            </tr>
            <tr>
                <td>Enter Name:</td>
                <td><input type="text" name="name" id="name"></td>
            </tr>
            <tr>
                <td>Enter Password:</td>
                <td><input type="password" name="password" id="password"></td>
            </tr>
            <tr>
                <td>Enter Address:</td>
                <td><textarea name="address" id="address" cols="30" rows="4"></textarea></td>
            </tr>
            <tr>
                <td>Select Game:</td>
                <td><input type="checkbox" id="game1" name="game[]" value="Hocky">
                    <label for="game1">Hocky</label><br>
                    <input type="checkbox" id="game2" name="game[]" value="Football">
                    <label for="game2">Football</label><br>
                    <input type="checkbox" id="game3" name="game[]" value="Badminton">
                    <label for="game3">Badminton</label><br>
                    <input type="checkbox" id="game4" name="game[]" value="Cricket">
                    <label for="game4">Cricket</label><br>

                </td>
            </tr>
            <tr>
                <td>Gender</td>
                <td><input type="radio" id="male" name="gender" value="male">
                    <label for="male">Male</label>
                    <input type="radio" id="female" name="gender" value="female">
                    <label for="female">Female</label>
                    <input type="radio" id="other" name="gender" value="other">
                    <label for="other">Other</label>
                </td>
            </tr>
            <tr>
                <td>Select Your Age</td>
                <td>
                    <select name="age" id="age">
                        <option value="-1">Select Age</option>
                        <option value="0-10">0-10</option>
                        <option value="10-20">11-20</option>
                        <option value="20-30">21-30</option>
                        <option value="30-40">31-40</option>
                        <option value="40-50">41-50</option>
                        <option value="50-60">51-60</option>
                        <option value="Above 60">Above 60</option>

                    </select>
                </td>

            </tr>
            <tr>
                <td colspan="2" align="center">
                    <input type="file" name="files" id="file">
                </td>
            </tr>
            <tr>
                <td colspan="2" align="center">
                    <input type="reset" value="Reset">
                    <input type="submit" value="submit" id="submit" name="submit">
                </td>

            </tr>
        </table>
    </form>

    <script src="validation.js"></script>


</body>

</html>