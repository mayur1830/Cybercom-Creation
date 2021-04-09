<?php $admins = $this->getAdmins();?>

<body>

    <div class="table-responsive">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-5">
                        <h2>Admin Details</h2>
                    </div>
                    <div class="col-sm-7">
                        <a onclick="object.setUrl('<?php echo $this->getUrl()->getUrl('form', 'Admin', [], true) ?>').resetParams().load(); "
                            class="btn btn-secondary"><i class="material-icons">&#xE147;</i> <span>Add New
                                Admin</span></a>
                    </div>
                </div>
            </div>
            <table class="table table-striped table-hover">
                <thead>


                    <th>Id</th>

                    <th>UserName</th>
                    <th>Password</th>
                    <th>Status</th>
                    <th>CreatedDate</th>

                    <th>Action</th>
                </thead>
                <tbody>
                    <?php if (!$admins): ?>
                    <tr>
                        <td colspan="6">No Record Found</td>
                    </tr>
                    <?php else: ?>
                    <?php foreach ($admins->getData() as $key => $admin): ?>

                    <tr>
                        <td><?php echo $admin->id ?></td>
                        <td><?php echo $admin->username ?></td>
                        <td><?php echo $admin->password ?></td>
                        <?php if ($admin->status == 1) {?>
                        <td><span class="status text-success">&bull;</span><?php echo 'Enable' ?></td>
                        <?php } else {?>
                        <td><span class="status text-warning">&bull;</span><?php echo 'Disable' ?></td>
                        <?php }?>
                        <td><?php echo $admin->createdDate ?></td>
                        <td>
                            <div class="buttons">
                                <a onclick="object.setUrl('<?php echo $this->getUrl()->getUrl('form', 'Admin', ['id' => $admin->id]) ?>').resetParams().load(); "
                                    class="edit" title="Edit" data-toggle="tooltip"><i class="material-icons"
                                        onclick="myFunction()">edit</i></a>
                                <a onclick="object.setUrl('<?php echo $this->getUrl()->getUrl('delete', 'Admin', ['id' => $admin->id]) ?>').resetParams().load(); "
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