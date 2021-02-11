<?php
// $conn = mysqli_connect("localhost", "root", "", "users") or die("connection failed");
// if (isset($_POST['id'])) {
//     $id = mysqli_real_escape_string($conn, $_POST['id']);
// }
// if ($id > 0) {

//     // Check record exists
//     $checkRecord = mysqli_query($con, "SELECT * FROM data WHERE id=" . $id);
//     $totalrows = mysqli_num_rows($checkRecord);

//     if ($totalrows > 0) {
//         // Delete record
//         $query = "DELETE FROM data WHERE id=" . $id;
//         mysqli_query($conn, $query);
//         echo 1;
//         exit;
//     } else {
//         echo 0;
//         exit;
//     }
// }

// echo 0;
// exit;

$id = $_POST['id'];
$conn = mysqli_connect("localhost", "root", "", "users") or die("connection failed");
$sql = "DELETE FROM `data` WHERE `data`.id=$id";
if (mysqli_query($conn, $sql)) {
    echo 1;
} else {

    echo 0;
}
