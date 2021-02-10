<?php

include "server.php";
//update
if (isset($_POST['update_categoey'])) {
    $title = mysqli_real_escape_string($db, $_POST['title']);
    $content = mysqli_real_escape_string($db, $_POST['content']);
    $url = mysqli_real_escape_string($db, $_POST['url']);
    $metatitle = mysqli_real_escape_string($db, $_POST['metatitle']);
    $parentcategory = mysqli_real_escape_string($db, $_POST['pc']);
    $image = $_FILES['image']['name'];
    $tmp_name = $_FILES['image']['tmp_name'];
    if (empty($title)) {
        array_push($errors, "Please Enter Title ");
    }
    if (empty($content)) {
        array_push($errors, "Please Enter Content");
    }
    if (empty($url)) {
        array_push($errors, "Please Enter Url");
    }
    if (empty($metatitle)) {
        array_push($errors, "Please Enter Meta title");
    }
    if (empty($parentcategory)) {
        array_push($errors, "Please Select Parent Category ");
    }
    if (empty($image)) {
        array_push($errors, "Please Enter Image ");
    }

    if (count($errors) == 0) {
        $id = $_POST['id'];
        move_uploaded_file($tmp_name, "C:/xampp/htdocs/mayur/exam/image/$image");
        date_default_timezone_set("Asia/Calcutta");
        $t = date('d-m-Y H:i:s');
        $url = uniqid() . $title;
        $sql = "UPDATE `category` SET `title` = '$title', `meta_title` = '$metatitle',`url`='$url',`content`='$content' , `updated`='$t',`image`='$image'  WHERE `category`.`id` =$id;";
        mysqli_query($db, $query);
        header('location: category.php');
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Update Category</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="style.css">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</head>

<body>
    <div class="container">



        <div class="buttons">
            <button type="button" class="btn btn-outline-primary"><a href="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">Manage Category</a></button>
            <button type="button" class="btn btn-outline-secondary">My Profile</button>
            <button type="button" class="btn btn-outline-success"><?php if (isset($_SESSION['email'])) : ?>
                    <a href="index.php?logout='1'">logout</a>
                <?php endif ?></button>

        </div>
    </div>
    <br>
    <br>
    <br>

    <?php
    $updateid = $_GET['id'];
    $conn = mysqli_connect("localhost", "root", "", "cybercom") or die("connection failed");
    $sql = "select * from category where id=$updateid";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
    ?>
            <form method="post" action="updatecategoey.php" enctype="multipart/form-data">
                <?php include('errors.php'); ?>
                <div class="input-group">
                    <label>Title</label>
                    <input type="text" name="title" value="<?php echo $row['title']; ?>">
                    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                </div>
                <div class="input-group">
                    <label>Content</label>
                    <input type="text" name="content" value="<?php echo $row['content']; ?>">
                </div>
                <div class="input-group">
                    <label>Url&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                    <input type="text" name="url" value="<?php echo $row['url']; ?>">
                </div>
                <div class="input-group">
                    <label>Meta title</label>
                    <input type="text" name="metatitle" value="<?php echo $row['meta_title']; ?>">
                </div>
                <div class="input-group">
                    <label>Parent Categoey</label>
                    <select name="pc" id="pc">
                        <option value="<?php echo $parentcategory; ?>">--</option>
                        <option value="Education">Education</option>
                        <option value="Lifestyle">Lifestyle</option>
                        <option value="Health">Health</option>
                    </select>
                </div>
                <div class="input-group">
                    <label>Image</label>
                    <input type="file" name="image" value="">
                </div>
                <div class="input-group">
                    <button type="submit" class="btn" name="update_category" value="<?php echo $image; ?>">Submit</button>
                </div>

            </form>
    <?php }
    }
    mysqli_close($conn)  ?>

</body>

</html>