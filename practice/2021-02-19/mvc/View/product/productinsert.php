<?php
require_once "./View/Template/header.php";
?>
<section class="get-in-touch">
    <p class="title">Create Product</p>
    <form method="post" class="product-form row" action="<?php echo $this->getUrl('save', 'Product') ?>">

        <div class="form-field col-lg-6">
            <input id="sku" name="product[sku]" class="input-text js-input" type="text" required>
            <label class="label" for="">SKU</label>
        </div>
        <div class="form-field col-lg-6">
            <input id="name" name="product[name]" class="input-text js-input" type="text" required>
            <label class="label" for="name">Name</label>
        </div>
        <div class="form-field col-lg-6">
            <input id="price" name="product[price]" class="input-text js-input" type="number" required>
            <label class="label" for="price">Price</label>
        </div>
        <div class="form-field col-lg-6">
            <input id="discount" name="product[discount]" class="input-text js-input" type="text" required>
            <label class="label" for="discount">Discount</label>
        </div>
        <div class="form-field col-lg-6">
            <input id="quantity" name="product[quantity]" class="input-text js-input" type="number" required>
            <label class="label" for="quantity">Quantity</label>
        </div>
        <div class="form-field col-lg-6">
            <textarea name="product[description]" id="description" class="input-text js-input" cols="30"
                rows="5"></textarea>
            <!-- <input id="des" class="input-text js-input" type="text" required> -->
            <label class="label" for="description">Description</label>
        </div>
        <div class="form-field col-lg-6">
            <label class="label" for="status">Status</label>
            <select id="status" class="input-text js-input" name="product[status]">
                <option value=""></option>
                <option value="enable">Enable</option>
                <option value="disable">Disable</option>

            </select>
        </div>
        <div class="form-field col-lg-12">
            <input class="submit-btn" type="submit" value="Submit">
        </div>
    </form>
</section>