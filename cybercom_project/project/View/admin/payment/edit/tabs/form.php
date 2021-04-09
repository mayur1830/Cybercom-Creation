<?php

$payment = $this->getTableRow();

?>
<div class="form-field col-lg-12">
    <p class="title"><?php echo $this->getTitle(); ?></p>
</div>
<div class="form-field col-lg-6">
    <input id="name" name="payment[name]" class="input-text js-input" type="text" value="<?php echo $payment->name ?>"
        required>
    <label class="label" for="name">Name</label>
</div>
<div class="form-field col-lg-6">
    <input id="code" name="payment[code]" class="input-text js-input" type="text" value="<?php echo $payment->code ?>"
        required>
    <label class="label" for="code">Code</label>
</div>

<div class="form-field col-lg-6">
    <textarea name="payment[description]" id="description" class="input-text js-input" cols="30" rows="5"
        value="<?php echo $payment->description ?>"><?php echo $payment->description ?></textarea>
    <label class="label" for="description">Description</label>
</div>
<div class="form-field col-lg-6">
    <label class="label" for="status">Status</label>
    <select id="status" class="input-text js-input" name="payment[status]">
        <?php
foreach ($payment->getStatusOptions() as $key => $value) {?>
        <option value="<?php echo $key ?>" <?php if ($payment->status == $key) {?> selected <?php }?>>
            <?php echo $value ?></option>

        <?php
}
?>
    </select>
</div>
<div class="form-field col-lg-12">
    <input class="submit-btn" type="button" value="Submit"
        onclick="object.resetParams().setForm('#paymentForm').load();">
</div>