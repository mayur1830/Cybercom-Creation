<?php
$customers = $this->getCustomers();
?>

<body>

    <div class="table-responsive">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-5">
                        <h2>Customers Details</h2>
                    </div>
                    <div class="col-sm-7">
                        <a href="http://localhost/mayur/project/?a=form&c=Admin_Customer" class="btn btn-secondary"><i
                                class="material-icons">&#xE147;</i> <span>Add New
                                Customer</span></a>
                    </div>
                </div>
            </div>
            <table class="table table-striped table-hover">
                <thead align="center">
                    <th>Id</th>
                    <th>Group Name</th>
                    <th>FirstName</th>
                    <th>LastName</th>
                    <th>Email</th>
                    <th>Mobile</th>
                    <th>Password</th>
                    <th>Status</th>
                    <th>ZipCode</th>
                    <th>CreatedDate</th>
                    <th>UpdatedDate</th>
                    <th>Action</th>
                </thead>
                <tbody align="center">
                    <?php if (!$customers): ?>
                    <tr>
                        <td colspan="10"> No Record Found</td>
                    </tr>
                    <?php else: ?>
                    <?php foreach ($customers->getData() as $key => $customer): ?>

                    <tr>
                        <td><?php echo $customer->id ?></td>
                        <td><?php echo $customer->group_name ?></td>
                        <td><?php echo $customer->firstname ?></td>
                        <td><?php echo $customer->lastname ?></td>
                        <td><?php echo $customer->email ?></td>
                        <td><?php echo $customer->mobile ?></td>
                        <td><?php echo $customer->password ?></td>
                        <?php if ($customer->status == 1) {?>
                        <td><span class="status text-success">&bull;</span><?php echo 'Enable' ?></td>
                        <?php } else {?>
                        <td><span class="status text-warning">&bull;</span><?php echo 'Disable' ?></td>
                        <?php }?>
                        <td><?php echo $customer->zipcode ?></td>
                        <td><?php echo $customer->createdDate ?></td>
                        <td><?php echo $customer->updatedDate ?></td>
                        <td>
                            <div class="buttons">
                                <a href="<?php echo $this->getUrl()->getUrl('form', null, ['id' => $customer->id]) ?>"
                                    class="edit" title="Edit" data-toggle="tooltip"><i
                                        class="material-icons">edit</i></a>
                                <a href="<?php echo $this->getUrl()->getUrl('delete', null, ['id' => $customer->id]) ?>"
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