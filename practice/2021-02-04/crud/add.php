<?php
include "header.php";
include "insert.php";
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
            <h2>Add Student Data</h2>
        </div>
        <p><span>* Required Fields</span></p>

        <form method="post">

            <div class="form-group">
                <label for="name">Name<span class="star">*</span></label>
                <input type="text" name="name" class="form-control" id="name" placeholder="Enter Your Name" value="<?php echo $name; ?>">
                <span class="error"><?php echo $nameErr; ?></span>
            </div>
            <div class="form-group">
                <label for="address">Address<span class="star">*</span></label>
                <input type="text" name="address" class="form-control" id="address" placeholder="Enter Your Address" value="<?php echo $address; ?>">
                <span class="error"><?php echo $addressErr; ?></span>
            </div>
            <div class="form-group">
                <label for="phone">Phone<span class="star">*</span></label>
                <input type="number" name="phone" class="form-control" id="phone" placeholder="Enter Your Phone Number" value="<?php echo $phone; ?>">
                <span class="error"><?php echo $phoneErr; ?></span>
            </div>
            <div class="form-group">
                <label for="class">Class<span class="star">*</span></label>
                <select class="form-control" name="class" id="class">
                    <option value="" selected>Select Class</option>
                    <?php
                    $conn = mysqli_connect("localhost", "root", "", "crud") or die("connection failed");
                    $sql = "select * from student_class";
                    $result = mysqli_query($conn, $sql) or die("unsuccessful");
                    while ($row = mysqli_fetch_assoc($result)) {
                        if ($select == $row['cid']) {
                    ?>
                            <option value="<?php echo $row['cid'] ?>" selected> <?php echo $row['cname'] ?> </option>
                        <?php } else { ?>

                            <option value="<?php echo $row['cid'] ?>"><?php echo $row['cname'] ?> </option>


                    <?php }
                    } ?>
                </select>
                <span class="error"><?php echo $selectErr; ?></span>
            </div>


            <button type="submit" class="btn btn-primary" name="submit">Add</button>
        </form>

    </div>
</body>

</html>