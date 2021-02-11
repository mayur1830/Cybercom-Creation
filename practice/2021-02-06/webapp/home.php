<?php
include "header.php";
?>




<div class="container-fluid">
    <div class="pagename">
        <h1>Home</h1>
        <hr>
        <h2>Welcome to the Home Page</h2>
    </div>
    <div id="main-content">
        <h2>All Records</h2>
        <?php
        $conn = mysqli_connect("localhost", "root", "", "users") or die("connection failed");
        $per_page_record = 3;
        if (isset($_GET["page"])) {
            $page  = $_GET["page"];
        } else {
            $page = 1;
        }

        $start_from = ($page - 1) * $per_page_record;

        $sql = "SELECT * FROM data LIMIT $start_from, $per_page_record";
        $result = mysqli_query($conn, $sql) or die("unsuccessful");

        if (mysqli_num_rows($result) > 0) {
        ?>
            <div class="table_data">
                <table collpadding="7px" border="3px" cellspacing="5px" align="center">
                    <thead>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Title</th>
                        <th>Created</th>
                        <th>Action</th>
                    </thead>
                    <tbody id="data-table">
                        <?php
                        while ($row = mysqli_fetch_assoc($result)) {
                        ?>

                            <tr>

                                <td><?php echo $row["id"] ?></td>
                                <td><?php echo $row["name"] ?></td>
                                <td><?php echo $row["email"] ?></td>
                                <td><?php echo $row["phone"] ?></td>
                                <td><?php echo $row["title"] ?></td>
                                <td><?php echo $row["date"] ?></td>
                                <td><button class="btn" id="update"><a href="update.php?id=<?php echo $row["id"] ?>">Update</a></button>&nbsp;&nbsp;<button class="btn delete-btn" id="delete" data-id="<?php echo $row['id'] ?>">Delete</button></td>
                                <!-- <a href=" d.php?id="> -->



                            </tr>
                        <?php } ?>
                    </tbody>
                </table>


                <div class=" pagination">
                    <?php
                    $query = "SELECT COUNT(*) FROM data";
                    $rs_result = mysqli_query($conn, $query);
                    if (mysqli_num_rows($rs_result) > 0) {


                        $row = mysqli_fetch_row($rs_result);

                        $total_records = $row[0];


                        echo "</br>";
                        // Number of pages required.   
                        $total_pages = ceil($total_records / $per_page_record);
                        $pagLink = "";

                        if ($page >= 2) {
                            echo "<a href='home.php?page=" . ($page - 1) . "'>  Prev </a>";
                        }

                        for ($i = 1; $i <= $total_pages; $i++) {
                            if ($i == $page) {
                                $pagLink .= "<a class = 'active' href='home.php?page="
                                    . $i . "'>" . $i . " </a>";
                            } else {
                                $pagLink .= "<a href='home.php?page=" . $i . "'>   
                                                " . $i . " </a>";
                            }
                        };
                        echo $pagLink;

                        if ($page < $total_pages) {
                            echo "<a href='home.php?page=" . ($page + 1) . "'>  Next </a>";
                        }
                    } else {
                        echo "no data found";
                    }

                    ?>
                </div>



            <?php } else {
            echo '<script>alert("no record found")</script>';
        }
        mysqli_close($conn);
            ?>
            </div>

    </div>
</div>
<script src="js/jquery-3.5.1.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {

        // Delete 
        $('#delete').click(function() {
            var el = this;
          

            // Delete id
            var deleteid = $(this).data('id');
            alert(deleteid);

            var confirmalert = confirm("Are you sure?");
            if (confirmalert == true) {
                // AJAX Request
                $.ajax({
                    url: 'd.php',
                    type: 'POST',
                    data: {
                        id: deleteid
                    },
                    success: function(response) {

                        if (response == 1) {
                            // Remove row from HTML Table
                            $(el).closest('tr').css('background', 'tomato');
                            $(el).closest('tr').fadeOut(800, function() {
                                $(this).remove();
                            });
                        } else {
                            alert('Invalid ID.');
                        }

                    }
                });
            }

        });

    });
</script>