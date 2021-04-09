<?php
$customergroup = $this->getTableRow();
?>
<div class="form-field col-lg-12">
    <p class="title"><?php echo $this->getTitle(); ?></p>
</div>
<div class="form-field col-lg-6">
    <input id="name" name="customergroup[group_name]" class="input-text js-input" type="text"
        value="<?php echo $customergroup->group_name ?>" required>
    <label class="label" for="name">Name</label>
</div>
<div class="form-field col-lg-6">
    <label class="label" for="status">Status</label>
    <select id="status" class="input-text js-input" name=customergroup[status]">
        <?php
foreach ($customergroup->getStatusOptions() as $key => $value) {?>
        <option value="<?php echo $key ?>" <?php if ($customergroup->status == $key) {?> selected <?php }?>>
            <?php echo $value ?></option>

        <?php
}
?>
    </select>
</div>
<div class="form-field col-lg-12">
    <input class="submit-btn" type="button" value="Submit"
        onclick="object.resetParams().setForm('#customergroupForm').load();">
</div>