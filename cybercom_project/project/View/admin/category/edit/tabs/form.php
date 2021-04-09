<?php
$category = $this->getTableRow();
$categoryOptions = $this->getCategoryOptions();
?>
<div class="form-field col-lg-12">
    <p class="title"><?php echo $this->getTitle(); ?></p>
</div>
<div class="form-field col-lg-6">
    <label class="label" for="parent">Parent Id</label>
    <select id="status" class="input-text js-input" name="category[parentid]">
        <?php if ($categoryOptions): ?>
        <?php foreach ($categoryOptions as $id => $name): ?>
        <option value="<?php echo $id; ?>" <?php if ($id == $category->parentid): ?>selected <?php endif;?>>
            <?php echo $name; ?></option>
        <?php endforeach;?>
        <?php endif;?>
    </select>
</div>

<div class="form-field col-lg-6">
    <input id="name" name="category[name]" class="input-text js-input" type="text" value="<?php echo $category->name ?>"
        required>
    <label class="label" for="name">Name</label>
</div>
<div class="form-field col-lg-6">
    <textarea name="category[description]" id="description" class="input-text js-input" cols="30" rows="5"
        value="<?php echo $category->description ?>"><?php echo $category->description ?></textarea>
    <label class="label" for="description">Description</label>
</div>
<div class="form-field col-lg-6">
    <label class="label" for="status">Status</label>
    <select id="status" class="input-text js-input" name=category[status]">
        <?php
foreach ($category->getStatusOptions() as $key => $value) {?>
        <option value="<?php echo $key ?>" <?php if ($category->status == $key) {?> selected <?php }?>>
            <?php echo $value ?></option>

        <?php
}
?>
    </select>
</div>
<div class="form-field col-lg-12">
    <input class="submit-btn" type="button" value="Submit"
        onclick="object.resetParams().setForm('#categoryForm').load();">
</div>