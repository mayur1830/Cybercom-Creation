<?php $imageData = $this->getProductMedia();?>
<div class="table-responsive">
    <div class="table-wrapper">
        <div class="table-title">
            <div class="row">
                <div class="col-sm-5">
                    <h2>Product Media</h2>
                </div>
                <div class="col-sm-7">
                    <input class="submit-btn" type="button" id="image_update" value="Update">
                    <input class="submit-btn" id="image_delete" type="button" value="Remove">
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
                <tr id="<?php echo $value->id; ?>">
                    <td><img id="img" src="skin/admin/image/product/<?php echo $value->image ?>" alt="no image"
                            width="100px" height="100px"></td>
                    <td><input type="text" name="data[<?php echo $value->id ?>][label]"
                            value="<?php echo $value->label; ?>"></td>
                    <td><input type="radio" name="data[small]" value="<?php echo $value->id ?>"
                            <?php if ($value->id == $value->small): ?>checked <?php endif;?>></td>
                    <td><input type="radio" name="data[thumb]" value="<?php echo $value->id ?>"
                            <?php if ($value->id == $value->thumb): ?>checked <?php endif;?>></td>
                    <td><input type="radio" name="data[base]" value="<?php echo $value->id ?>"
                            <?php if ($value->id == $value->base): ?>checked <?php endif;?>></td>
                    <td><input type="checkbox" name="data[<?php echo $value->id ?>][gallery]"
                            value="<?php echo $value->id ?>" <?php if ($value->id == $value->gallery): ?>checked
                            <?php endif;?>></td>
                    <td><input type="checkbox" value="<?php echo $value->id ?>" class="checkeditem"
                            name="imageIds[<?php echo $value->id ?>]"></td>
                </tr>
                <?php endforeach;?>
                <?php endif;?>
            </tbody>
        </table>
        <div class="form-field col-lg-6">
            <input id="image" name="image" class="input-text js-input" type="file">
        </div>
        <div class="form-field col-lg-6">
            <input class="submit-btn" type="button" id="image_upload" value="Upload">
        </div>
    </div>
</div>
<script>
$(document).ready(function() {

    $("#image_update").click(function() {
        $('form').attr('action',
            '<?php echo $this->getUrl()->getUrl('save', 'Product_Media'); ?>'
        );
        var dataString = $('#productForm').serialize();
        $.ajax({
            url: $('#productForm').prop('action'),
            type: "POST",
            data: dataString,
            success: function(response) {
                console.log(response);
                $.each(response.element, function(i, element) {
                    $(element.selector).html(element
                        .html);
                });
            },
        })
    });

});
$(document).ready(function() {

    $("#image_upload").click(function() {
        $('form').attr('action',
            '<?php echo $this->getUrl()->getUrl('save', 'Product_Media'); ?>'
        );
        var fd = new FormData();
        var files = $('#image')[0].files;
        if (files.length > 0) {
            fd.append('image', files[0]);
            $.ajax({
                url: $('#productForm').prop('action'),
                type: 'post',
                data: fd,
                contentType: false,
                processData: false,
                success: function(response) {
                    console.log(response);
                    $.each(response.element, function(i, element) {
                        $(element.selector).html(element.html);
                    });
                },

            });
        } else {
            alert("Please select a file.");
        }
    });
});

$(document).ready(function() {
    $('#image_delete').click(function() {
        $('form').attr('action',
            '<?php echo $this->getUrl()->getUrl('delete', 'Product_Media'); ?>'
        );
        var id = [];
        $(".checkeditem:checkbox:checked").each(function(key) {
            id[key] = $(this).val();
        })
        if (id.length === 0) {
            alert("Please Select atleast one checkbox");
        } else {
            $.ajax({
                url: $('#productForm').prop('action'),
                type: "POST",
                data: {
                    id: id
                },
                success: function() {
                    for (var i = 0; i < id.length; i++) {
                        $('tr#' + id[i] + '').css('background',
                            'linear-gradient(125deg, #a72879, #064497)'
                        );
                        $('tr#' + id[i] + '').fadeOut('slow');
                    }
                }
            })
        }

    });

});
</script>