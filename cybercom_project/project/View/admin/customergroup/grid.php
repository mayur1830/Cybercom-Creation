<?php

$customerGroups = $this->getCustomerGroups();

?>

<body>

    <div class="table-responsive">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-5">
                        <h2>CustomerGroup Details</h2>
                    </div>
                    <div class="col-sm-7">
                        <a href="http://localhost/mayur/project/?a=form&c=Admin_CustomerGroup"
                            class="btn btn-secondary"><i class="material-icons">&#xE147;</i> <span>Add New
                                Customer Group</span></a>
                    </div>
                </div>
            </div>
            <table class="table table-striped table-hover">
                <thead>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Status</th>
                    <th>CreatedDate</th>
                    <th>Action</th>
                </thead>
                <tbody>
                    <?php if (!$customerGroups): ?>
                    <tr>
                        <td>No Record Found</td>
                    </tr>
                    <?php else: ?>
                    <?php foreach ($customerGroups->getData() as $key => $customerGroup): ?>

                    <tr>
                        <td><?php echo $customerGroup->id ?></td>
                        <td><?php echo $customerGroup->group_name ?></td>
                        <?php if ($customerGroup->status == 1) {?>
                        <td><span class="status text-success">&bull;</span><?php echo 'Enable' ?></td>
                        <?php } else {?>
                        <td><span class="status text-warning">&bull;</span><?php echo 'Disable' ?></td>
                        <?php }?>
                        <td><?php echo $customerGroup->createdDate ?></td>
                        <td>
                            <div class="buttons">
                                <a href="<?php echo $this->getUrl()->getUrl('form', null, ['id' => $customerGroup->id]) ?>"
                                    class="edit" title="Edit" data-toggle="tooltip"><i
                                        class="material-icons">edit</i></a>
                                <a href="<?php echo $this->getUrl()->getUrl('delete', null, ['id' => $customerGroup->id]) ?>"
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