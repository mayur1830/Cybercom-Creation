<?php $imageData = $this->getProductMedia();

?>
<div class="table-responsive">
    <div class="table-wrapper">
        <div class="table-title">
            <div class="row">
                <div class="col-sm-5">
                    <h2>Product Media</h2>
                </div>
                <div class="col-sm-7">
                    <input class="submit-btn" type="submit" value="Update">
                    <input class="submit-btn" id="target" type="submit" value="Remove">
                </div>
            </div>
        </div>
        <table class="table table-striped table-hover">
            <thead align="center">
                <th>Image</th>
                <th>Label</th>
                <th>Small</th>
                <th>Thumb</th>
                <th>Base</th>
                <th>Gallery</th>
                <th>Remove</th>
            </thead>
            <tbody>
                <?php if (!$imageData): ?>
                <tr>
                    <td>No Record Found</td>
                </tr>
                <?php else: ?>
                <?php foreach ($imageData->getData() as $key => $value): ?>
                <tr>
                    <td><img src="skin/admin/image/product/<?php echo $value->image ?>" alt="no image" width="100px"
                            height="100px"></td>
                    <th><input type="text" name="data[<?php echo $value->id ?>][label]"
                            value="<?php echo $value->label; ?>"></th>
                    <th><input type="radio" name="data[small]" value="<?php echo $value->id ?>"
                            <?php if ($value->id == $value->small): ?>checked <?php endif;?>></th>
                    <th><input type="radio" name="data[thumb]" value="<?php echo $value->id ?>"
                            <?php if ($value->id == $value->thumb): ?>checked <?php endif;?>></th>
                    <th><input type="radio" name="data[base]" value="<?php echo $value->id ?>"
                            <?php if ($value->id == $value->base): ?>checked <?php endif;?>></th>
                    <th><input type="checkbox" name="data[<?php echo $value->id ?>][gallery]"
                            value="<?php echo $value->id ?>" <?php if ($value->id == $value->gallery): ?>checked
                            <?php endif;?>></th>
                    <th><input type="checkbox" name="imageIds[<?php echo $value->id ?>]"></th>
                </tr>
                <?php endforeach;?>
                <?php endif;?>
            </tbody>
        </table>
        <div class="form-field col-lg-6">
            <input id="image" name="image" class="input-text js-input" type="file">
        </div>
        <div class="form-field col-lg-6">
            <input class="submit-btn" type="submit" value="Upload">
        </div>
    </div>
</div>
<script>
$('form').attr('action',
    '<?php echo $this->getUrl()->getUrl('save', 'Admin_Product_Media'); ?>'
);

$("#target").click(function() {
    $('form').attr('action',
        '<?php echo $this->getUrl()->getUrl('delete', 'Admin_Product_Media'); ?>'
    );
});
</script>