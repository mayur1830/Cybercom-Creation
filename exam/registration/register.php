<?php include('server.php') ?>
<!DOCTYPE html>
<html>

<head>
    <title>Registration Form</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
    <div class="header">
        <h2>Register</h2>
    </div>

    <form method="post" action="register.php">
        <?php include('errors.php'); ?>
        <div class="input-group">
            <label>Prefix</label>
            <select name="prefix" id="prefix">
                <option value="">---</option>
                <option value="Mr">Mr</option>
                <option value="Mrs">Mrs</option>
            </select>
        </div>
        <div class="input-group">
            <label>First Name</label>
            <input type="text" name="firstname" value="<?php echo $firstname; ?>">
        </div>
        <div class="input-group">
            <label>Last Name</label>
            <input type="text" name="lastname" value="<?php echo $lastname; ?>">
        </div>
        <div class="input-group">
            <label>Email</label>
            <input type="email" name="email" value="<?php echo $email; ?>">
        </div>
        <div class="input-group">
            <label>Mobile Number</label>
            <input type="number" name="mobilenumber" value="<?php echo $mobile; ?>">
        </div>
        <div class="input-group">
            <label>Password</label>
            <input type="password" name="password_1" value="<?php echo $password_1; ?>">
        </div>
        <div class="input-group">
            <label>Confirm password</label>
            <input type="password" name="password_2" value="<?php echo $password_2; ?>">
        </div>
        <div class="input-group">
            <label>Information</label>
            <input type="text" name="information" value="<?php echo $information; ?>">
        </div>
        <div class="input-group">
            <input type="checkbox" value="true" id="tc" name="tc">
            <label for="tc">Hereby,I Accept terms and conditions.</label>
        </div>
        <div class="input-group">
            <button type="submit" class="btn" name="reg_user">Register</button>
        </div>

    </form>
</body>

</html>