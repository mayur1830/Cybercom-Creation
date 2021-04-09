<?php
$customer = $this->getTableRow();
$customerGroup = $this->getCustomerGroup();

?>
<div class="form-field col-lg-12">
    <p class="title"><?php echo $this->getTitle(); ?></p>
</div>
<div class="form-field col-lg-6">
    <label class="label" for="status">CustomerGroup</label>
    <select id="status" class="input-text js-input" name="customer[group_id]">
        <option value="---" disabled selected></option>
        <?php foreach ($customerGroup->getData() as $key => $customerGroup): ?>

        <option value="<?php echo $customerGroup->id ?>" <?php if ($customer->group_id == $customerGroup->id): ?>
            selected <?php endif;?>>
            <?php echo $customerGroup->group_name ?></option>
        <?php endforeach?>
    </select>
</div>
<div class="form-field col-lg-6">
    <input id="firstname" name="customer[firstname]" class="input-text js-input" type="text"
        value="<?php echo $customer->firstname ?>" required>
    <label class="label" for="name">FirstName</label>
</div>
<div class="form-field col-lg-6">
    <input id="lastname" name="customer[lastname]" class="input-text js-input" type="text"
        value="<?php echo $customer->lastname ?>" required>
    <label class="label" for="name">LastName</label>
</div>
<div class="form-field col-lg-6">
    <input id="email" name="customer[email]" class="input-text js-input" type="text"
        value="<?php echo $customer->email ?>" required>
    <label class="label" for="email">Email</label>
</div>
<div class="form-field col-lg-6">
    <input id="mobile" name="customer[mobile]" class="input-text js-input" type="number"
        value="<?php echo $customer->mobile ?>" required>
    <label class="label" for="mobile">Mobile Number</label>
</div>
<div class="form-field col-lg-6">
    <input id="password" name="customer[password]" class="input-text js-input" type="password"
        value="<?php echo $customer->password ?>" required>
    <label class="label" for="password">Password</label>
</div>

<div class="form-field col-lg-6">
    <label class="label" for="status">Status</label>
    <select id="status" class="input-text js-input" name="customer[status]">
        <option value="---" disabled selected></option>

        <?php
foreach ($customer->getStatusOptions() as $key => $value) {?>
        <option value="<?php echo $key ?>" <?php if ($customer->status == $key) {?> selected <?php }?>>
            <?php echo $value ?></option>

        <?php
}
?>
    </select>
</div>
<div class="form-field col-lg-12">
    <input class="submit-btn" type="button" value="Submit"
        onclick="object.resetParams().setForm('#customerForm').load();">
</div>