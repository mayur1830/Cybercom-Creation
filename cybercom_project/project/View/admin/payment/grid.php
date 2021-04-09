<?php $payments = $this->getPayments();?>

<body>

    <div class="table-responsive">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-5">
                        <h2>Paymant Details</h2>
                    </div>
                    <div class="col-sm-7">
                        <a onclick="object.setUrl('<?php echo $this->getUrl()->getUrl('form', 'Payment', [], true) ?>').resetParams().load(); "
                            class="btn btn-secondary"><i class="material-icons">&#xE147;</i> <span>Add New
                                Product</span></a>
                    </div>
                </div>
            </div>
            <table class="table table-striped table-hover">
                <thead>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Code</th>
                    <th>Description</th>
                    <th>Status</th>
                    <th>CreatedDate</th>
                    <th>Action</th>
                </thead>
                <tbody>
                    <?php if (!$payments): ?>
                    <tr>
                        <td>No Record Found</td>
                    </tr>
                    <?php else: ?>
                    <?php foreach ($payments->getData() as $key => $payment): ?>

                    <tr>
                        <td><?php echo $payment->id ?></td>
                        <td><?php echo $payment->name ?></td>
                        <td><?php echo $payment->code ?></td>
                        <td><?php echo $payment->description ?></td>
                        <?php if ($payment->status == 1) {?>
                        <td><span class="status text-success">&bull;</span><?php echo 'Enable' ?></td>
                        <?php } else {?>
                        <td><span class="status text-warning">&bull;</span><?php echo 'Disable' ?></td>
                        <?php }?>
                        <td><?php echo $payment->createdDate ?></td>
                        <td>
                            <div class="buttons">
                                <a onclick="object.setUrl('<?php echo $this->getUrl()->getUrl('form', 'Payment', ['id' => $payment->id]) ?>').resetParams().load(); "
                                    class="edit" title="Edit" data-toggle="tooltip"><i class="material-icons"
                                        onclick="myFunction()">edit</i></a>
                                <a onclick="object.setUrl('<?php echo $this->getUrl()->getUrl('delete', 'Payment', ['id' => $payment->id]) ?>').resetParams().load(); "
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