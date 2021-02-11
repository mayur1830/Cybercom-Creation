<?php
$stu_id = $_GET['id'];
include "header.php";
include "validation.php";
// print_r($_POST);
if (!empty($name) && !empty($email) && !empty($phone) && !empty($title) && !empty($date)) {
    $id = $_POST['sid'];
    $conn = mysqli_connect("localhost", "root", "", "users") or die("connection failed");
    $sql = "UPDATE `data` SET `name` = '$name', `email` = '$email',`phone`='$phone',`title`='$title' , `date`='$date' WHERE `data`.`id` =$id;";
    $result = mysqli_query($conn, $sql) or die("unsuccessful");

    header("location:home.php");

    mysqli_close($conn);
}


?>

<body>
    <div class="container-fluid">
        <div class="pagename">
            <h1>Update Contacts <?php echo $stu_id ?></h1>
            <hr>

        </div>
        <?php

        $conn = mysqli_connect("localhost", "root", "", "users") or die("connection failed");
        $sql = "select * from data where id=$stu_id";
        $result = mysqli_query($conn, $sql) or die("unsuccessful");
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
        ?>
                <div class="user_form">
                    <form id="form" class="form" name="form" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" onsubmit="return validate()">
                        <div class="form-row">
                            <div class="form-group success col-md-6">
                                <label for="id">ID</label>
                                <input type="hidden" name="sid" id="sid" value="<?php echo $stu_id; ?>">
                                <input type="number" class="form-control" id="id" name="id" value="<?php echo $row['id']; ?>" disabled>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="Enter Your Name" value="<?php echo $row['name']; ?>">
                                <i class="fa fa-check-circle-o" aria-hidden="true"></i>
                                <i class="fas fa-exclamation-circle"></i>
                                <small>Error Message</small>
                                <span class="error"><?php echo $nameErr; ?></span>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="">Email</label>
                                <input type="email" class="form-control" id="email" name="email" placeholder="Enter Your Email " value="<?php echo $row['email']; ?>">
                                <i class="fas fa-check-circle"></i>
                                <i class="fas fa-exclamation-circle"></i>
                                <small>Error Message</small>
                                <span class="error"><?php echo $emailErr; ?></span>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="">Phone</label>
                                <input type="number" class="form-control input-sm" id="phone" name="phone" placeholder="Enter Your Phone Number" value="<?php echo $row['phone']; ?>">
                                <i class="fas fa-check-circle"></i>
                                <i class="fas fa-exclamation-circle"></i>
                                <small>Error Message</small>
                                <span class="error"><?php echo $phoneErr; ?></span>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="">Title</label>
                                <input type="text" class="form-control" id="title" name="title" placeholder="Enter Your Title" value="<?php echo $row['title']; ?>">
                                <i class="fas fa-check-circle"></i>
                                <i class="fas fa-exclamation-circle"></i>
                                <small>Error Message</small>
                                <span class="error"><?php echo $titleErr; ?></span>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="created">Created</label>
                                <?php
                                $d = date("Y-m-d\TH:i:s", strtotime($row['date']));
                                ?>
                                <input type="datetime-local" class="form-control" id="date" name="date" value="<?php echo $d; ?>">
                                <i class=" fas fa-check-circle"></i>
                                <i class="fas fa-exclamation-circle"></i>
                                <small>Error Message</small>
                                <span class="error"><?php echo $dateErr; ?></span>
                            </div>
                            <div class="form-group col-md-6">
                                <button type="submit" class="btn btn-success" name="submit">Update</button>
                            </div>
                        </div>
                    </form>
                </div>
        <?php }
        }
        mysqli_close($conn)  ?>
    </div>
    <script src="js/validation.js"></script>
</body>