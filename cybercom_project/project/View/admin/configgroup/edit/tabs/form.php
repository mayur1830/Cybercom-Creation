<?php
$configgroup = $this->getTableRow();
?>
<div class="form-field col-lg-12">
    <p class="title"><?php echo $this->getTitle(); ?></p>
</div>
<div class="form-field col-lg-6">
    <input id="name" name="configgroup[name]" class="input-text js-input" type="text"
        value="<?php echo $configgroup->name ?>" required>
    <label class="label" for="name">Name</label>
</div>
<div class="form-field col-lg-12">
    <input class="submit-btn" type="button" value="Submit"
        onclick="object.resetParams().setForm('#configgroupForm').load();">
</div>