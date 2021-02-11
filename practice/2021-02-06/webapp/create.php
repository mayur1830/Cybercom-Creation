<?php
include "header.php";
include "validation.php";
if (!empty($name) && !empty($email) && !empty($phone) && !empty($title) && !empty($date)) {
    $conn = mysqli_connect("localhost", "root", "", "users") or die("connection failed");
    $sql = "INSERT INTO `data` (`name`, `email`, `phone`, `title`, `date`) VALUES ('$name', '$email', '$phone', '$title', current_timestamp())";
    $result = mysqli_query($conn, $sql) or die("unsuccessful");
    mysqli_close($conn);
    header("location:home.php");
}
?>

<body>
    <div class="container-fluid">
        <div class="user_form">
            <form id="form" class="form" name="form" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" onsubmit="return validate()">
                <div class="form-row">
                    <div class="form-group success col-md-6">
                        <label for="id">ID</label>
                        <input type="text" class="form-control" id="id" name="id" placeholder="auto" disabled>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Enter Your Name" value="<?php echo $name; ?>">
                        <i class="fa fa-check-circle-o" aria-hidden="true"></i>
                        <i class="fas fa-exclamation-circle"></i>
                        <small>Error Message</small>
                        <span class="error"><?php echo $nameErr; ?></span>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="">Email</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Enter Your Email " value="<?php echo $email; ?>">
                        <i class="fas fa-check-circle"></i>
                        <i class="fas fa-exclamation-circle"></i>
                        <small>Error Message</small>
                        <span class="error"><?php echo $emailErr; ?></span>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="">Phone</label>
                        <input type="number" class="form-control input-sm" id="phone" name="phone" placeholder="Enter Your Phone Number" value="<?php echo $phone; ?>">
                        <i class="fas fa-check-circle"></i>
                        <i class="fas fa-exclamation-circle"></i>
                        <small>Error Message</small>
                        <span class="error"><?php echo $phoneErr; ?></span>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="">Title</label>
                        <input type="text" class="form-control" id="title" name="title" placeholder="Enter Your Title" value="<?php echo $title; ?>">
                        <i class="fas fa-check-circle"></i>
                        <i class="fas fa-exclamation-circle"></i>
                        <small>Error Message</small>
                        <span class="error"><?php echo $titleErr; ?></span>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="created">Created</label>
                        <input type="datetime-local" class="form-control" id="date" name="date" value="<?php echo $date; ?>">
                        <i class="fas fa-check-circle"></i>
                        <i class="fas fa-exclamation-circle"></i>
                        <small>Error Message</small>
                        <span class="error"><?php echo $dateErr; ?></span>
                    </div>
                    <div class="form-group col-md-6">
                        <button type="submit" class="btn btn-success" name="submit" id="create_submit">Create</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <script src="js/validation.js"></script>


</body>