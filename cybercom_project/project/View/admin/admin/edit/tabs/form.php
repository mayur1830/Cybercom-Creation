<?php
$admin = $this->getAdmin();
$p = $this->getOptions();

?>
<div class="form-field col-lg-12">
    <p class="title"><?php echo $this->getTitle(); ?></p>
</div>
<div class="form-field col-lg-6">
    <input id="username" name="admin[username]" class="input-text js-input" type="text"
        value="<?php echo $admin->username ?>" required>
    <label class="label" for="name">UserName</label>
</div>
<div class="form-field col-lg-6">
    <input id="password" name="admin[password]" class="input-text js-input" type="password"
        value="<?php echo $admin->password ?>" required>
    <label class="label" for="password">Password</label>
</div>
<div class="form-field col-lg-6">
    <label class="label" for="status">Status</label>
    <select id="status" class="input-text js-input" name="admin[status]">
        <?php
foreach ($p as $key => $value) {?>
        <option value="<?php echo $key ?>" <?php if ($admin->status == $key) {?> selected <?php }?>>
            <?php echo $value ?></option>

        <?php
}
?>
    </select>
</div>
<div class="form-field col-lg-12">
    <input class="submit-btn" type="submit" value="Submit">
</div>