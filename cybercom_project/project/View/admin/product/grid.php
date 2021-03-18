<?php $products = $this->getProducts();?>
<div class="table-responsive">
    <div class="table-wrapper">
        <div class="table-title">
            <div class="row">
                <div class="col-sm-5">
                    <h2>Product Details</h2>
                </div>
                <div class="col-sm-7">
                    <a href="http://localhost/mayur/project/index.php?a=form&c=Admin_product"
                        class="btn btn-secondary"><i class="material-icons">&#xE147;</i> <span>Add New
                            Product</span></a>
                </div>
            </div>
        </div>
        <table class="table table-striped table-hover">
            <thead align="center">


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
            <tbody align="center">
                <?php if (!$products): ?>
                <tr>
                    <td colspan="11" al>No Record Found</td>
                </tr>
                <?php else: ?>
                <?php

foreach ($products->getData() as $key => $product):
?>

                <tr>
                    <td><?php echo $product->id ?></td>
                    <td><?php echo $product->sku ?></td>
                    <td><?php echo $product->name ?></td>
                    <td><?php echo $product->price ?></td>
                    <td><?php echo $product->discount ?></td>
                    <td><?php echo $product->quantity ?></td>
                    <td><?php echo $product->description ?></td>
                    <?php if ($product->status == 1) {?>
                    <td><span class="status text-success">&bull;</span><?php echo 'Enable' ?></td>
                    <?php } else {?>
                    <td><span class="status text-warning">&bull;</span><?php echo 'Disable' ?></td>
                    <?php }?>


                    <td><?php echo $product->createdDate ?></td>
                    <td><?php echo $product->updatedDate ?></td>
                    <td>
                        <div class="buttons">

                            <a href="<?php echo $this->getUrl()->getUrl('form', null, ['id' => $product->id]) ?>"
                                class="edit" title="Edit" data-toggle="tooltip"><i class="material-icons"
                                    onclick="myFunction()">edit</i></a>
                            <a href="<?php echo $this->getUrl()->getUrl('delete', null, ['id' => $product->id]) ?>"
                                class="delete" title="Delete" data-toggle="tooltip"><i
                                    class="material-icons">&#xE5C9;</i></a>
                        </div>
                    </td>




                </tr>
                <?php endforeach;?>
                <?php endif;?>

            </tbody>

        </table>

    </div>
</div>