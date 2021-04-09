<?php $categories = $this->getCategories();?>

<div class="table-responsive">
    <div class="table-wrapper">
        <div class="table-title">
            <div class="row">
                <div class="col-sm-5">
                    <h2>Category Details</h2>
                </div>
                <div class="col-sm-7">
                    <a onclick="object.setUrl('<?php echo $this->getUrl()->getUrl('form', 'Category', [], true) ?>').resetParams().load(); "
                        class="btn btn-secondary"><i class="material-icons">&#xE147;</i> <span>Add New
                            Category</span></a>
                </div>
            </div>
        </div>
        <table class="table table-striped table-hover">
            <thead>
                <th>Id</th>
                <th>Name</th>
                <th>Status</th>
                <th>ParentID</th>
                <th>PathId</th>
                <th>Action</th>
            </thead>
            <tbody>
                <?php if (!$categories): ?>
                <tr>
                    <td colspan="6">No Record Found</td>
                </tr>
                <?php else: ?>
                <?php

foreach ($categories->getData() as $key => $category):
?>

                <tr>
                    <td><?php echo $category->id ?></td>
                    <td><?php echo $this->getName($category); ?></td>
                    <?php if ($category->status == 1) {?>
                    <td><span class="status text-success">&bull;</span><?php echo 'Enable' ?></td>
                    <?php } else {?>
                    <td><span class="status text-warning">&bull;</span><?php echo 'Disable' ?></td>
                    <?php }?>
                    <td><?php echo $category->parentid ?></td>
                    <td><?php echo $category->pathid ?></td>
                    <td>
                        <div class="buttons">
                            <a onclick="object.setUrl('<?php echo $this->getUrl()->getUrl('form', 'Category', ['id' => $category->id]) ?>').resetParams().load(); "
                                class="edit" title="Edit" data-toggle="tooltip"><i class="material-icons"
                                    onclick="myFunction()">edit</i></a>
                            <a onclick="object.setUrl('<?php echo $this->getUrl()->getUrl('delete', 'Category', ['id' => $category->id]) ?>').resetParams().load(); "
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