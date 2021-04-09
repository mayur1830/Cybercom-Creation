<?php $configs = $this->getTableRow()->getConfigs();?>
<div class="table-responsive">
    <div class="table-wrapper">
        <div class="table-title">
            <div class="row">
                <div class="col-sm-5">
                    <h2>Configuration Details</h2>
                </div>
                <div class="col-sm-7">
                    <input class="submit-btn" type="button" id="configUpdate" value="Update">
                    <input class="submit-btn add-row" type="button" value="Add Config">

                </div>
            </div>
        </div>
        <table class="table table-striped table-hover config-list">
            <thead align="center">
                <th>Title</th>
                <th>Code</th>
                <th>Value</th>
            </thead>

            <tbody id="exitsTableBody" align="center">
                <?php if ($configs): ?>
                <?php foreach ($configs->getData() as $config): ?>
                <tr>
                    <td><input type="text" name="exist[<?=$config->configId?>][title]" class="form-control"
                            value="<?=$config->title?>"></td>
                    <td><input type="text" class="form-control" name="exist[<?=$config->configId?>][code]"
                            value="<?=$config->code?>">
                    </td>
                    <td><input type="text" class="form-control" name="exist[<?=$config->configId?>][value]"
                            value="<?=$config->value?>">
                    </td>
                    <td><input class="submit-btn dl" type="button" value="Delete Option"
                            data-id="delete[<?=$config->configId?>]">
                    </td>
                </tr>
                <?php endforeach;?>
                <?php endif;?>
            </tbody>

        </table>
    </div>
</div>
<script type="text/javascript">
$(document).ready(function() {
    $(".add-row").click(function() {
        var markup =
            '<tr><td><input type="text" name="new[config][title]" class="form - control"/></td><td><input type="text"   name="new[config][code]" class="form - control"/></td><td><input type="text" name="new[config][value]" class="form - control"/></td><td><input class="submit-btn dl" type="button" value="Delete Config"></td></tr>';
        $("table tbody").append(markup);
    });
    $("#configUpdate").click(function() {

        var dataString = $('input').serializeArray()
        $.ajax({
            url: '<?php echo $this->getUrl()->getUrl('save', 'ConfigGroup_Config'); ?>',
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
    $(".dl").click(function() {
        $.ajax({
            url: '<?php echo $this->getUrl()->getUrl('delete', 'ConfigGroup_Config'); ?>',
            type: "POST",
            data: $(this).attr('data-id'),
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
</script>