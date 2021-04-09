<?php
$attribute = $this->getTableRow();

?>
<div class="form-field col-lg-12">
    <p class="title"><?php echo $this->getTitle(); ?></p>
</div>
<div class="form-field col-lg-6">
    <label class="label" for="entityType">Entity Type</label>
    <select id="entityType" class="input-text js-input" name="attribute[entityId]">
        <option value="" selected disabled></option>
        <?php foreach ($attribute->getEntityTypes() as $key => $value): ?>

        <option value="<?php echo $key ?>" <?php if ($key == $attribute->entityId): ?> selected <?php endif;?>>
            <?php echo $value ?>
        </option>

        <?php endforeach?>
    </select>
</div>
<div class="form-field col-lg-6">
    <input id="name" name="attribute[name]" class="input-text js-input" type="text"
        value="<?php echo $attribute->name ?>" required>
    <label class="label" for="name">Name</label>
</div>
<div class="form-field col-lg-6">
    <input id="code" name="attribute[code]" class="input-text js-input" type="text"
        value="<?php echo $attribute->code ?>" required>
    <label class="label" for="code">Code</label>
</div>
<div class="form-field col-lg-6">
    <label class="label" for="backendType">InputType</label>
    <select id="backendType" class="input-text js-input" name="attribute[inputType]">
        <option value="" selected disabled></option>

        <?php foreach ($attribute->getInputTypes() as $key => $value): ?>

        <option value="<?php echo $key ?>" <?php if ($key == $attribute->inputType): ?> selected <?php endif;?>>
            <?php echo $value ?>
        </option>

        <?php endforeach?>
    </select>
</div>
<div class="form-field col-lg-6">
    <label class="label" for="backendType">BackendType</label>
    <select id="backendType" class="input-text js-input" name="attribute[backendType]">
        <option value="" selected disabled></option>
        <?php foreach ($attribute->getBackendTypes() as $key => $value): ?>

        <option value="<?php echo $key ?>" <?php if ($key == $attribute->backendType): ?> selected <?php endif;?>>
            <?php echo $value ?>
        </option>

        <?php endforeach?>
    </select>
</div>
<div class="form-field col-lg-6">
    <input id="sortOrder" name="attribute[sortOrder]" class="input-text js-input" type="text"
        value="<?php echo $attribute->sortOrder ?>" required>
    <label class="label" for="sortOrder">SortOrder</label>
</div>
<div class="form-field col-lg-12">
    <input class="submit-btn" type="button" value="Submit"
        onclick="object.resetParams().setForm('#attributeForm').load();">
</div>