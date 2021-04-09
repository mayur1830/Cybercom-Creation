<?php
$shipping = $this->getTableRow();

?>
<div class="form-field col-lg-12">
    <p class="title"><?php echo $this->getTitle(); ?></p>
</div>
<div class="form-field col-lg-6">
    <input id="name" name="shipping[name]" class="input-text js-input" type="text" value="<?php echo $shipping->name ?>"
        required>
    <label class="label" for="name">Name</label>
</div>
<div class="form-field col-lg-6">
    <input id="code" name="shipping[code]" class="input-text js-input" type="text" value="<?php echo $shipping->code ?>"
        required>
    <label class="label" for="code">Code</label>
</div>
<div class="form-field col-lg-6">
    <input id="amount" name="shipping[amount]" class="input-text js-input" type="text"
        value="<?php echo $shipping->amount ?>" required>
    <label class="label" for="amount">Amount</label>
</div>

<div class="form-field col-lg-6">
    <textarea name="shipping[description]" id="description" class="input-text js-input" cols="30" rows="5"
        value="<?php echo $shipping->description ?>"><?php echo $shipping->description ?></textarea>
    <label class="label" for="description">Description</label>
</div>
<div class="form-field col-lg-6">
    <label class="label" for="status">Status</label>
    <select id="status" class="input-text js-input" name="shipping[status]">
        <?php
foreach ($shipping->getStatusOptions() as $key => $value) {?>
        <option value="<?php echo $key ?>" <?php if ($shipping->status == $key) {?> selected <?php }?>>
            <?php echo $value ?></option>

        <?php
}
?>
    </select>
</div>
<div class="form-field col-lg-12">
    <input class="submit-btn" type="button" value="Submit"
        onclick="object.resetParams().setForm('#shippingForm').load();">
</div>