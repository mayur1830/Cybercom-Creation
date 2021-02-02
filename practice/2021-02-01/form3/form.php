<?php
if (isset($_POST["submit"])) {
    echo "<h2>Your given values are as :</h2>";
    echo ("Your name is" . " " . $_POST['firstname']) . "<br>";
    echo ("Your name is" . " " . $_POST['lastname']) . "<br>";
    echo "Your Date Of Birth is" . " " . $_POST['month'] . " " . $_POST['day'] . " " . $_POST['year'] . "<br>";
    echo "Your Gender is" . " " . $_POST['gender'] . "<br>";
    echo "Your Country is" . " " . $_POST['country'] . "<br>";
    echo "Your Email is" . " " . $_POST['email'] . "<br>";
    echo "Your Phone Number is" . " " . $_POST['phone'] . "<br>";
    echo ("Your Password is" . " " . $_POST['password']) . "<br>";
    echo ("Your Confirm Password is" . " " . $_POST['cpassword']) . "<br>";
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

    <div id="user_data">

        <form name="myForm" action="form.php" method="post" onsubmit="return (validate())">
            <div id="header">
                <h1>Signup</h1>
            </div>
            <br>
            <div>
                <label>First Name</label>
                <input type="text" name="firstname" id="firstname" placeholder="Enter First Name">
            </div>
            <br>
            <div>
                <label>Last Name</label>
                <input type="tetx" name="lastname" placeholder="Enter Last Name">
            </div>
            <br>
            <div>
                <label for="dob">Dob</label>
                <select name="month" id="month" required>
                    <option value='-1'>Month</option>
                    <option value="Jan">Jan</option>
                    <option value="Feb">Feb</option>
                    <option value="March">March</option>
                    <option value="April">April</option>
                    <option value="May">May</option>
                    <option value="June">June</option>
                    <option value="July">July</option>
                    <option value="August">August</option>
                    <option value="September">September</option>
                    <option value="October">October</option>
                    <option value="November">November</option>
                    <option value="December">December</option>

                </select>
                <select name="day" id="day">
                    <option name='Day' value="-1">Day</option>
                    <option value="1">01</option>
                    <option value="2">02</option>
                    <option value="3">03</option>
                    <option value="4">04</option>
                    <option value="5">05</option>
                    <option value="6">06</option>
                    <option value="7">07</option>
                    <option value="8">08</option>
                    <option value="9">09</option>
                    <option value="10">10</option>
                    <option value="11">11</option>
                    <option value="12">12</option>
                    <option value="13">13</option>
                    <option value="14">14</option>
                    <option value="15">15</option>
                    <option value="16">16</option>
                    <option value="17">17</option>
                    <option value="18">18</option>
                    <option value="19">19</option>
                    <option value="20">20</option>
                    <option value="21">21</option>
                    <option value="22">22</option>
                    <option value="23">23</option>
                    <option value="24">24</option>
                    <option value="25">25</option>
                    <option value="26">26</option>
                    <option value="27">27</option>
                    <option value="28">28</option>
                    <option value="29">29</option>
                    <option value="30">30</option>
                    <option value="31">31</option>

                </select>
                <select name="year" id="year">
                    <option name="year" value="-1">Year</option>
                    <option value="1990">1990</option>
                    <option value="1991">1991</option>
                    <option value="1992">1992</option>
                    <option value="1993">1993</option>
                    <option value="1994">1994</option>
                    <option value="1995">1995</option>
                    <option value="1996">1996</option>
                    <option value="1997">1997</option>
                    <option value="1998">1998</option>
                    <option value="1998">1999</option>
                    <option value="2000">2000</option>
                    <option value="2001">2001</option>
                    <option value="2002">2002</option>
                    <option value="2003">2003</option>
                    <option value="2004">2004</option>
                    <option value="2005">2005</option>
                    <option value="2006">2006</option>
                    <option value="2007">2007</option>
                    <option value="2008">2008</option>
                    <option value="2009">2009</option>
                    <option value="2010">2010</option>
                    <option value="2011">2011</option>
                    <option value="2012">2012</option>
                    <option value="2013">2013</option>
                    <option value="2014">2014</option>
                    <option value="2015">2015</option>
                    <option value="2016">2016</option>
                    <option value="2017">2017</option>
                    <option value="2018">2018</option>
                    <option value="2019">2019</option>
                    <option value="2020">2020</option>
                    <option value="2021">2021</option>

                </select>
            </div>
            <br>
            <div>
                <label>Gender</label>
                <input type="radio" id="male" name="gender" value="male">&nbsp;Male
                <input type="radio" id="female" name="gender" value="female">&nbsp;Female
                <input type="radio" id="other" name="gender" value="other">&nbsp;Other
            </div>
            <br>
            <div>
                <label>Country</label>
                <select id="country" name="country">
                    <option value="-1">Country</option>
                    <option value="Afganistan">Afghanistan</option>
                    <option value="Albania">Albania</option>
                    <option value="Algeria">Algeria</option>
                    <option value="American Samoa">American Samoa</option>
                    <option value="Andorra">Andorra</option>
                    <option value="Angola">Angola</option>
                </select>
            </div>
            <br>
            <div>
                <label for="email">Email</label>
                <input type="email" name="email" id="email" placeholder="Enter E-mail">
            </div>
            <br>
            <div>
                <label for="phone">Phone</label>
                <input type="tel" name="phone" id="phone" placeholder="Enter Phone Number">
            </div>
            <br>
            <div>
                <label for="password">Password</label>
                <input type="password" name="password" id="password">
            </div>
            <br>
            <div>
                <label for="password">Confirm Password</label>
                <input type="password" name="cpassword" id="cpassword">
            </div>
            <br>
            <div id="agreement">
                <input type="checkbox" name="agree" value="1" id="agree">I accept this agreement.
            </div>
            <br>
            <div id="buttons">
                <input type="reset" value="Reset" id="reset">
                <input type="submit" value="Submit" name="submit" id="submit">
            </div>

        </form>

    </div>
    <script src="validation.js"></script>
</body>

</html>