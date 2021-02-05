<?php
$stu_id = $_POST['id'];
include "header.php";
$idErr = "";
$id = "";
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['go'])) {

    if (empty($_POST["id"])) {
        $idErr = "* Id is required";
    } else {
        $id = test_input($_POST["id"]);

        $conn = mysqli_connect("localhost", "root", "", "crud") or die("connection failed");
        $sql = "DELETE FROM STUDENT where sid=$stu_id";
        $result = mysqli_query($conn, $sql) or die("unsuccessful");
        header("location:home.php");
        mysqli_close($conn);
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
            <h2>Delete Student Data</h2>
        </div>
        <p><span>* Required Fields</span></p>
        <form action="#" method="post">
            <div class="form-group">
                <label for="id">Id<span class="star">*</span></label>
                <input type="number" name="id" class="form-control" id="sid" value="<?php echo $id ?>" placeholder="Enter Your Phone Id">
                <span class="error"><?php echo $idErr; ?></span>
            </div>

            <button type="submit" class="btn btn-primary" name="go">Go</button>
        </form>
        <?php
        if (isset($_POST['go'])) {
            $conn = mysqli_connect("localhost", "root", "", "crud") or die("connection failed");

            $stu_id = $_POST['id'];

            $sql = "select * from student where sid=$stu_id ";
            $result = mysqli_query($conn, $sql) or die("unsuccessfil");
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {


        ?>
                    <form method="post">

                        <div class="form-group">
                            <label for="name">Name<span class="star">*</span></label>
                            <input type="hidden" name="sid" id="sid" value="<?php echo $row['sid']; ?>">
                            <input type="text" name="name" class="form-control" id="name" disabled placeholder="Enter Your Name" value="<?php echo $row['sname']; ?>">

                        </div>
                        <div class="form-group">
                            <label for="address">Address<span class="star">*</span></label>
                            <input type="text" name="address" class="form-control" id="address" disabled placeholder="Enter Your Address" value="<?php echo  $row['saddress']; ?>">

                        </div>
                        <div class="form-group">
                            <label for="phone">Phone<span class="star">*</span></label>
                            <input type="number" name="phone" class="form-control" id="phone" disabled placeholder="Enter Your Phone Number" value="<?php echo  $row['sphone']; ?>">

                        </div>
                        <div class="form-group">
                            <label for="class">Class<span class="star">*</span></label>
                            <select class="form-control" name="class" id="class" disabled>
                                <option value="" selected disabled>Select Class</option>
                                <?php
                                $sql1 = "select * from student_class";
                                $result1 = mysqli_query($conn, $sql1) or die("unsuccessful");
                                while ($row1 = mysqli_fetch_assoc($result1)) {
                                    if ($row['sclass'] == $row1['cid']) {
                                ?>
                                        <option value="<?php echo $row1['cid'] ?>" selected disabled> <?php echo $row1['cname'] ?> </option>
                                    <?php } else { ?>

                                        <option value="<?php echo $row1['cid'] ?>" disabled><?php echo $row1['cname'] ?> </option>


                                <?php }
                                } ?>
                            </select>

                        </div>


                        <button type="submit" class="btn btn-primary" name="submit">Delete</button>
                    </form>
        <?php }
            }
        } ?>
    </div>
</body>

</html>