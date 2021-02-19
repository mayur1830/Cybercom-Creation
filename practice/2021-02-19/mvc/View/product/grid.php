<?php
// echo "<pre>";
// print_r($this->getProduct());
require_once "./View/Template/header.php";
$row = $this->getProduct();
?>

<body>

    <div class="table-responsive">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-5">
                        <h2>Product Details</h2>
                    </div>
                    <div class="col-sm-7">
                        <a href="http://localhost/mayur/mvc/?a=productinsert&c=product" class="btn btn-secondary"><i
                                class="material-icons">&#xE147;</i> <span>Add New
                                Product</span></a>

                    </div>
                </div>
            </div>
            <table class="table table-striped table-hover">
                <thead>


                    <th>Id</th>
                    <th>SKU</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Discount</th>
                    <th>Quentity</th>
                    <th>Description</th>
                    <th>Status</th>
                    <th>CreatedDate</th>
                    <th>UpdatedDate</th>
                    <th>Action</th>
                </thead>
                <tbody>
                    <?php

                    for ($i = 0; $i < count($row); $i++) {
                    ?>

                    <tr>
                        <td><?php echo $row[$i]["id"] ?></td>
                        <td><?php echo $row[$i]["sku"] ?></td>
                        <td><?php echo $row[$i]["name"] ?></td>
                        <td><?php echo $row[$i]["price"] ?></td>
                        <td><?php echo $row[$i]["discount"] ?></td>
                        <td><?php echo $row[$i]["quantity"] ?></td>
                        <td><?php echo $row[$i]["description"] ?></td>
                        <?php if ($row[$i]["status"] == "enable") { ?>
                        <td><span class="status text-success">&bull;</span><?php echo $row[$i]["status"] ?></td>
                        <?php } else { ?>
                        <td><span class="status text-warning">&bull;</span><?php echo $row[$i]["status"] ?></td>
                        <?php } ?>


                        <td><?php echo $row[$i]["createdDate"] ?></td>
                        <td><?php echo $row[$i]["updatedDate"] ?></td>
                        <td>
                            <div class="buttons">
                                <a href="<?php echo $this->getUrl('productupdate', 'Product', ['id' => $row[$i]["id"]]) ?>"
                                    class="edit" title="Edit" data-toggle="tooltip"><i
                                        class="material-icons">edit</i></a>
                                <a href="<?php echo $this->getUrl('productdelete', 'Product', ['id' => $row[$i]["id"]]) ?>"
                                    class="delete" title="Delete" data-toggle="tooltip"><i
                                        class="material-icons">&#xE5C9;</i></a>
                            </div>
                        </td>
                        <!-- <a href=" d.php?id="> -->



                    </tr>
                    <?php
                    } ?>

                </tbody>

            </table>

        </div>
    </div>

</body>