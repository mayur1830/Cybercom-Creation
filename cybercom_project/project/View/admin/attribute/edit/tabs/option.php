<?php $options = $this->getTableRow()->getOptions();?>
<div class="table-responsive">
    <div class="table-wrapper">
        <div class="table-title">
            <div class="row">
                <div class="col-sm-5">
                    <h2>Attribute Options Details</h2>
                </div>
                <div class="col-sm-7">
                    <input class="submit-btn" type="button" id="optionUpdate" value="Update">
                    <input class="submit-btn add-row" type="button" value="Add Option">

                </div>
            </div>
        </div>
        <table class="table table-striped table-hover option-list">
            <thead align="center">
                <th>Name</th>
                <th>Sort Order</th>
                <th>Delete</th>
            </thead>

            <tbody id="exitsTableBody" align="center">
                <?php if ($options): ?>
                <?php foreach ($options->getData() as $option): ?>
                <tr>
                    <td><input type="text" name="exist[<?=$option->id?>][name]" class="form-control"
                            value="<?=$option->name?>"></td>
                    <td><input type="text" class="form-control" name="exist[<?=$option->id?>][sortOrder]"
                            value="<?=$option->sortOrder?>">
                    </td>
                    <td><input class="submit-btn delete-btn" type="button" value="Delete Option"></td>
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
            '<tr><td><input type="text" id="optionname"  name="new[option][name]" class="form - control"/></td><td><input type="text" id="optionsortorder"  name="new[option][sortOrder]" class="form - control"/></td><td><input class="submit-btn delete-btn" type="button" value="Delete Option"></td></tr>';
        $("table tbody").append(markup);
    });
    $("#optionUpdate").click(function() {

        var dataString = $('input').serializeArray()
        $.ajax({
            url: '<?php echo $this->getUrl()->getUrl('save', 'Attribute_Option'); ?>',
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
</script>