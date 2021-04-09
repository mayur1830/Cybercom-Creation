<?php
$cmsPage = $this->getTableRow();
?>
<div class="form-field col-lg-12">
    <p class="title"><?php echo $this->getTitle(); ?></p>
</div>
<div class="form-field col-lg-6">
    <input id="title" name="cmsPage[title]" class="input-text js-input" type="text"
        value="<?php echo $cmsPage->title ?>" required>
    <label class="label" for="">Title</label>
</div>
<div class="form-field col-lg-6">
    <input id="identifier" name="cmsPage[identifier]" class="input-text js-input" type="text"
        value="<?php echo $cmsPage->identifier ?>" required>
    <label class="label" for="">Identifier</label>
</div>

<div class="form-field col-lg-12">
    <div class="form-field col-lg-6">
        <label class="label" for="content">Content</label>
    </div>
    <textarea name="cmsPage[content]" id="content" class="input-text js-input" cols="80" rows="10"
        value="<?php echo $cmsPage->content ?>"><?php echo $cmsPage->content ?></textarea>
</div>

<div class="form-field col-lg-6">
    <label class="label" for="status">Status</label>
    <select id="status" class="input-text js-input" name="cmsPage[status]">
        <?php
foreach ($cmsPage->getStatusOptions() as $key => $value) {?>
        <option value="<?php echo $key ?>" <?php if ($cmsPage->status == $key) {?> selected <?php }?>>
            <?php echo $value ?></option>

        <?php
}
?>
    </select>
</div>
<div class="form-field col-lg-12">
    <input class="submit-btn" type="button" value="Submit"
        onclick="object.resetParams().setForm('#cmspageForm').load();">
</div>
<script>
CKEDITOR.replace('cmsPage[content]');
</script>