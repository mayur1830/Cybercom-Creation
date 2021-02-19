<?php
require_once "View/header.php";

?>
<div class="container">
    <br><br><br>
    <div id="main-content">
        <h2 style="text-align: center;">All Records</h2>
        <?php


        $row = $this->getCustomer();

        if ($row) {
        ?>
        <div class="table_data">
            <table collpadding="7px" border="3px" cellspacing="10px" align="center" width="800px ">
                <thead>
                    <th>Id</th>
                    <th>Firstname</th>
                    <th>Lastname</th>
                    <th>Email</th>
                    <th>MobileNo</th>
                    <th>Password</th>
                    <th>Status</th>
                    <th>CreatedDate</th>
                    <th>UpdatedDate</th>
                    <th>Action</th>
                </thead>
                <tbody id="data-table" align="center">
                    <?php

                        for ($i = 0; $i < count($row); $i++) {
                        ?>

                    <tr>

                        <td><?php echo $row[$i]["id"] ?></td>
                        <td><?php echo $row[$i]["firstname"] ?></td>
                        <td><?php echo $row[$i]["lastname"] ?></td>
                        <td><?php echo $row[$i]["email"] ?></td>
                        <td><?php echo $row[$i]["mobile"] ?></td>
                        <td><?php echo $row[$i]["password"] ?></td>
                        <td><?php echo $row[$i]["status"] ?></td>
                        <td><?php echo $row[$i]["createdDate"] ?></td>
                        <td><?php echo $row[$i]["updatedDate"] ?></td>
                        <td><button class="btn" id="update"><a
                                    href="<?php echo $this->getUrl('customerupdate', 'Customer') . '&id=' . $row[$i]["id"]; ?>">Update</a></button>&nbsp;&nbsp;<button
                                class="btn delete-btn" id="delete" data-id="<?php echo $row['id'] ?>"><a
                                    href="<?php echo $this->getUrl('customerdelete', 'Customer') . '&id=' . $row[$i]["id"]; ?>">Delete</a></button>
                        </td>
                        <!-- <a href=" d.php?id="> -->



                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
        <?php } else {
        ?>
        <script>
        alert("No record found")
        </script>
        <?php } ?>
    </div>
</div>