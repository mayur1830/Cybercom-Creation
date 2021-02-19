<?php
require_once "./View/Template/header.php";

?>
<div class="container">
    <br><br><br>
    <div id="main-content">
        <h2 style="text-align: center;">All Records</h2>
        <?php
        $row = $this->getCategory();
        echo "<pre>";
        // print_r($row);
        // die();
        if ($row) {
        ?>
        <div class="table_data">
            <table collpadding="7px" border="3px" cellspacing="10px" align="center" width="500px ">
                <thead style="text-align: center;">
                    <th>Id</th>
                    <th>Name</th>
                    <th>Status</th>
                    <th>Description</th>
                    <th>Action</th>
                </thead>
                <tbody id="data-table" align="center">
                    <?php

                        for ($i = 0; $i < count($row); $i++) {

                        ?>

                    <tr>

                        <td><?php echo $row[$i]["id"] ?></td>
                        <td><?php echo $row[$i]["name"] ?></td>
                        <td><?php echo $row[$i]["status"] ?></td>
                        <td><?php echo $row[$i]["description"] ?></td>
                        <td><button class="btn" id="update"><a
                                    href="<?php echo $this->getUrl('categoryupdate', 'category') . '&id=' . $row[$i]["id"]; ?>">Update</a></button>&nbsp;&nbsp;<button
                                class="btn delete-btn" id="delete" data-id="<?php echo $row['id'] ?>"><a
                                    href="<?php echo $this->getUrl('categorydelete', 'category') . '&id=' . $row[$i]["id"]; ?>">Delete</a></button>
                        </td>
                        <!-- <a href=" d.php?id="> -->



                    </tr>
                    <?php
                        } ?>
                </tbody>
            </table>






            <?php } else { ?>
            <script>
            alert("No record found")
            </script>
            <?php
        }
            ?>
        </div>


    </div>
</div>