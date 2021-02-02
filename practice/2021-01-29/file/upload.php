<?php
//we have one super global variable $_FILES for accessing files

if (isset($_FILES['doc']['name'])) {
    $file_name = $_FILES['doc']['name'];
    $file_size = $_FILES['doc']['size'];
    $file_tmp = $_FILES['doc']['tmp_name'];
    $file_type = $_FILES['doc']['type'];
    $extension = strtolower(substr($file_name, strpos($file_name, '.') + 1));
    $size = 2097152;
    echo '<pre>';
    print_r($_FILES);
    echo '</pre>';
    if (!empty($file_name)) {
        if (($extension == 'jpg' || $extension == 'jpeg') && $file_type == 'image/jpeg' && $file_size < $size) {
            if (move_uploaded_file($file_tmp, "C:/xampp/htdocs/mayur/2021-01-29/file/fileupload" . $file_name)) {
                echo 'file upload successfully';
            } else {
                'File is not uploaded';
            }
        } else {
            echo 'please select file is image and size must be <2MB';
        }
    } else {
        echo "Please Select File";
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>File Uploading</title>
</head>

<body>
    <form action="upload.php" method="post" enctype="multipart/form-data">
        <input type="file" name="doc" id="doc"><br><br>
        <input type="submit" value="submit">


    </form>
</body>

</html>