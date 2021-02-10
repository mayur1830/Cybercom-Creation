<!DOCTYPE html>
<html lang="en">

<head>

    <head>
        <title>Category</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="style.css">
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    </head>
</head>

<body>
    <div class="container">


        <div class="buttons">
            <button type="button" class="btn btn-outline-primary"><a href="category.php">Manage Category</a></button>
            <button type="button" class="btn btn-outline-secondary">My Profile</button>
            <button type="button" class="btn btn-outline-success"><?php if (isset($_SESSION['email'])) : ?>
                    <a href="index.php?logout='1'">logout</a>
                <?php endif ?></button>





        </div>

        <div>
            <h2>Blog Category</h2>
            <button type="button" class="btn btn-outline-primary"><a href="addcategory.php">Add Category</a></button>
        </div>
    </div>


    <div class="container-fluid">

        <div id="main-content">
            <h2>All Records</h2>
            <?php
            $conn = mysqli_connect("localhost", "root", "", "cybercom") or die("connection failed");



            $sql = "SELECT * FROM category";
            $result = mysqli_query($conn, $sql) or die("unsuccessful");

            if (mysqli_num_rows($result) > 0) {
            ?>
                <div class="table_data">
                    <table collpadding="7px" border="3px" cellspacing="10px" align="center" width="800px ">
                        <thead>
                            <th>Category Id</th>
                            <th>Category Image</th>
                            <th>Category Name</th>
                            <th>Created Date</th>
                            <th>Action</th>
                        </thead>
                        <tbody id="data-table" align="center">
                            <?php
                            while ($row = mysqli_fetch_assoc($result)) {
                            ?>

                                <tr>

                                    <td><?php echo $row["id"] ?></td>
                                    <td><img src="../image/<?php echo $row["image"] ?>" alt="" width="80px" heigh="70px"></td>
                                    <td><?php echo $row["meta_title"] ?></td>
                                    <td><?php echo $row["created"] ?></td>
                                    <td><button class="btn" id="update"><a href="updatecategory.php?id=<?php echo $row["id"] ?>">Update</a></button>&nbsp;&nbsp;<button class="btn delete-btn" id="delete" data-id="<?php echo $row['id'] ?>"><a href="deletecategory.php?id=<?php echo $row["id"] ?>">Delete</a></button></td>
                                    <!-- <a href=" d.php?id="> -->



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
    </div>
</body>

</html>