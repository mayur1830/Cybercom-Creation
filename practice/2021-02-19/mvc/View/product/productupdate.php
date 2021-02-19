<?php
require_once "./View/Template/header.php";
$product = $this->getModel_Product();

echo "<pre>";
print_r($product);
echo $product->id;
die();
?>
<div class="container">
    <h2 style="text-align:center ;">Product Form</h2>
    <div class="porduct_form">
        <form method="post" action="<?php echo $this->getUrl('update', 'Product') ?>">
            <?php

            $id = $_GET['id'];
            $query = "select * from product where `id`=$id";
            $adapter = new Adapter();
            $row = $adapter->fetchRow($query);
            ?>
            <div class="form-group">
                <label for="">SKU</label>
                <input type="hidden" name="product[id]" value=" <?php echo $row[0]['id']  ?>">
                <input type="text" class="form-control" id="sku" name="product[sku]"
                    value="<?php echo $row[0]['sku']  ?>">
            </div>
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" name="product[name]"
                    value="<?php echo $row[0]['name']  ?>">
            </div>
            <div class="form-group">
                <label for="price">Price</label>
                <input type="text" class="form-control" id="price" name="product[price]"
                    value="<?php echo $row[0]['price']  ?>">
            </div>
            <div class="form-group">
                <label for="discount">Discount</label>
                <input type="text" class="form-control" id="discount" name="product[discount]"
                    value="<?php echo $row[0]['discount']  ?>">
            </div>
            <div class="form-group">
                <label for="quentity">Quentity</label>
                <input type="number" class="form-control" id="quentity" name="product[quentity]"
                    value="<?php echo $row[0]['quentity']  ?>">
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea class="form-control" id="description" name="product[description]" rows="3"
                    value="<?php echo $row[0]['description'] ?>"><?php echo $row[0]['description'] ?></textarea>
            </div>
            <div class="form-group">
                <label for="status">Status</label>
                <select class="form-control" id="status" name="product[status]">
                    <?php
                    $select = ['enable' => "Enable", 'disable' => "Disable"];
                    foreach ($select as $key => $value) {
                        if ($key === $row[0]['status']) {
                    ?>
                    <option value="<?php echo $key ?>" selected><?php echo $value ?></option>
                    <?php
                        } else {
                        ?>
                    <option value="<?php echo $key ?>"><?php echo $value ?></option>
                    <?php
                        }
                    }
                    ?>


                </select>
            </div>



            <button type="submit" class="btn btn-primary" value="submit">Submit</button>
            <?php
            // }
            ?>
        </form>

    </div>

</div>