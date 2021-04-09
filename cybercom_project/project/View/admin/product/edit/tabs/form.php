<?php
$product = $this->getTableRow();

?>
<div class="form-field col-lg-12">
    <p class="title"><?php echo $this->getTitle(); ?></p>
</div>
<div class="form-field col-lg-6">
    <input id="sku" name="product[sku]" class="input-text js-input" type="text" value="<?php echo $product->sku ?>"
        required>
    <label class="label" for="">SKU</label>
</div>
<div class="form-field col-lg-6">
    <input id="name" name="product[name]" class="input-text js-input" type="text" value="<?php echo $product->name ?>"
        required>
    <label class="label" for="name">Name</label>
</div>
<div class="form-field col-lg-6">
    <input id="price" name="product[price]" class="input-text js-input" type="number"
        value="<?php echo $product->price ?>" required>
    <label class="label" for="price">Price</label>
</div>
<div class="form-field col-lg-6">
    <input id="discount" name="product[discount]" class="input-text js-input" type="text"
        value="<?php echo $product->discount ?>" required>
    <label class="label" for="discount">Discount</label>

</div>
<div class="form-field col-lg-6">
    <input id="quantity" name="product[quantity]" class="input-text js-input" type="number"
        value="<?php echo $product->quantity ?>" required>
    <label class="label" for="quantity">Quantity</label>
</div>
<div class="form-field col-lg-6">
    <textarea name="product[description]" id="description" class="input-text js-input" cols="30" rows="5"
        value="<?php echo $product->description ?>"><?php echo $product->description ?></textarea>
    <!-- <input id="des" class="input-text js-input" type="text" required> -->
    <label class="label" for="description">Description</label>
</div>
<div class="form-field col-lg-6">
    <label class="label" for="status">Status</label>
    <select id="status" class="input-text js-input" name="product[status]">
        <?php
foreach ($product->getStatusOptions() as $key => $value) {?>
        <option value="<?php echo $key ?>" <?php if ($product->status == $key) {?> selected <?php }?>>
            <?php echo $value ?></option>

        <?php
}
?>
    </select>
</div>
<div class="form-field col-lg-12">

    <input class="submit-btn" type="button" value="Submit"
        onclick="object.resetParams().setForm('#productForm').load();">
</div>