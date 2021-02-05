<?php
include "header.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Document</title>
</head>

<body>
    <div id="main-content">
        <h2>All Records</h2>
        <?php
        $conn = mysqli_connect("localhost", "root", "", "crud") or die("connection failed");
        $sql = "select * from student JOIN student_class where student.sclass=student_class.cid";
        $result = mysqli_query($conn, $sql) or die("unsuccessful");
        if (mysqli_num_rows($result) > 0) {



        ?>
            <div class="table_data">
                <table collpadding="7px" border="3px" cellspacing="5px" align="center">
                    <thead>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Address</th>
                        <th>Phone</th>
                        <th>Class</th>
                        <th>Action</th>
                    </thead>
                    <tbody>
                        <?php
                        while ($row = mysqli_fetch_assoc($result)) {
                        ?>
                            <tr>
                                <td><?php echo $row["sid"] ?></td>
                                <td><?php echo $row["sname"] ?></td>
                                <td><?php echo $row["saddress"] ?></td>
                                <td><?php echo $row["cname"] ?></td>
                                <td><?php echo $row["sphone"] ?></td>
                                <td><button class="btn" id="update"><a href="edit.php?id=<?php echo $row["sid"] ?>">Update</a></button>&nbsp;&nbsp;<button class=" btn" id="delete"><a href="delete_inline.php?id=<?php echo $row["sid"] ?>">Delete</a></button></td>


                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            <?php } else {
            echo '<script>alert("no record found")</script>';
        }
        mysqli_close($conn);
            ?>
            </div>

    </div>
</body>

</html>