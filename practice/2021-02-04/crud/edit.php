<?php
$stu_id = $_GET['id'];
include "header.php";
include "updatedata.php";

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add</title>
</head>

<body>
    <div class="form_container">
        <div class="add">
            <h2>Update Student Data</h2>
        </div>
        <?php
        $conn = mysqli_connect("localhost", "root", "", "crud") or die("connection failed");

        $sql = "select * from student where sid=$stu_id ";
        $result = mysqli_query($conn, $sql) or die("unsuccessfil");
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {




        ?>
                <p><span>* Required Fields</span></p>
                <form method="post">

                    <div class="form-group">
                        <label for="name">Name<span class="star">*</span></label>
                        <input type="hidden" name="sid" id="sid" value="<?php echo $stu_id; ?>">
                        <input type="text" name="name" class="form-control" id="name" placeholder="Enter Your Name" value="<?php echo $row['sname']; ?>">
                        <span class="error"><?php echo $nameErr; ?></span>
                    </div>
                    <div class="form-group">
                        <label for="address">Address<span class="star">*</span></label>
                        <input type="text" name="address" class="form-control" id="address" placeholder="Enter Your Address" value="<?php echo  $row['saddress']; ?>">
                        <span class="error"><?php echo $addressErr; ?></span>
                    </div>
                    <div class="form-group">
                        <label for="phone">Phone<span class="star">*</span></label>
                        <input type="number" name="phone" class="form-control" id="phone" placeholder="Enter Your Phone Number" value="<?php echo  $row['sphone']; ?>">
                        <span class="error"><?php echo $phoneErr; ?></span>
                    </div>
                    <div class="form-group">
                        <label for="class">Class<span class="star">*</span></label>
                        <select class="form-control" name="class" id="class">
                            <option value="" selected>Select Class</option>
                            <?php
                            $sql1 = "select * from student_class";
                            $result1 = mysqli_query($conn, $sql1) or die("unsuccessful");
                            while ($row1 = mysqli_fetch_assoc($result1)) {
                                if ($row['sclass'] == $row1['cid']) {
                            ?>
                                    <option value="<?php echo $row1['cid'] ?>" selected> <?php echo $row1['cname'] ?> </option>
                                <?php } else { ?>

                                    <option value="<?php echo $row1['cid'] ?>"><?php echo $row1['cname'] ?> </option>


                            <?php }
                            } ?>
                        </select>
                        <span class="error"><?php echo $selectErr; ?></span>
                    </div>


                    <button type="submit" class="btn btn-primary" name="submit">Update</button>
                </form>
        <?php }
        }  ?>
    </div>
</body>

</html>