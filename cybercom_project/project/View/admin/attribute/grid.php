<?php $attributes = $this->getAttributes();?>

<body>

    <div class="table-responsive">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-5">
                        <h2>Attribute Details</h2>
                    </div>
                    <div class="col-sm-7">
                        <a onclick="object.setUrl('<?php echo $this->getUrl()->getUrl('form', 'Attribute', [], true) ?>').resetParams().load(); "
                            class="btn btn-secondary"><i class="material-icons">&#xE147;</i> <span>Add New
                                Attribute</span></a>
                    </div>
                </div>
            </div>
            <table class="table table-striped table-hover">
                <thead>
                    <th>Id</th>
                    <th>Entity Type</th>
                    <th>Name</th>
                    <th>Code</th>
                    <th>Input Type</th>
                    <th>Backend Type</th>
                    <th>Sort Order</th>
                    <th>Action</th>
                </thead>
                <tbody>
                    <?php if (!$attributes): ?>
                    <tr>
                        <td colspan="8">No Record Found</td>
                    </tr>
                    <?php else: ?>
                    <?php foreach ($attributes->getData() as $key => $attribute): ?>

                    <tr>
                        <td><?php echo $attribute->id ?></td>
                        <td><?php echo $attribute->entityId ?></td>
                        <td><?php echo $attribute->name ?></td>
                        <td><?php echo $attribute->code ?></td>
                        <td><?php echo $attribute->inputType ?></td>
                        <td><?php echo $attribute->backendType ?></td>
                        <td><?php echo $attribute->sortOrder ?></td>
                        <td>
                            <div class="buttons">
                                <a onclick="object.setUrl('<?php echo $this->getUrl()->getUrl('form', 'Attribute', ['id' => $attribute->id]) ?>').resetParams().load(); "
                                    class="edit" title="Edit" data-toggle="tooltip"><i class="material-icons"
                                        onclick="myFunction()">edit</i></a>
                                <a onclick="object.setUrl('<?php echo $this->getUrl()->getUrl('delete', 'Attribute', ['id' => $attribute->id]) ?>').resetParams().load(); "
                                    class="delete" title="Delete" data-toggle="tooltip"><i
                                        class="material-icons">&#xE5C9;</i></a>
                            </div>
                        </td>
                    </tr>
                    <?php endforeach;?>
                    <?php endif;?>
                </tbody>

            </table>

        </div>
    </div>

</body>