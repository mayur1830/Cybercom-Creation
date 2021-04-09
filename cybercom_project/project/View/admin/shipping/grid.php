<?php $shippings = $this->getShippings();?>
<div class="table-responsive">
    <div class="table-wrapper">
        <div class="table-title">
            <div class="row">
                <div class="col-sm-5">
                    <h2>Shipping Details</h2>
                </div>
                <div class="col-sm-7">
                    <a onclick="object.setUrl('<?php echo $this->getUrl()->getUrl('form', 'Shipping', [], true) ?>').resetParams().load(); "
                        class="btn btn-secondary"><i class="material-icons">&#xE147;</i> <span>Add New
                            Shipping</span></a>
                </div>
            </div>
        </div>
        <table class="table table-striped table-hover">
            <thead>
                <th>Id</th>
                <th>Name</th>
                <th>Code</th>
                <th>Amount</th>
                <th>Description</th>
                <th>Status</th>
                <th>CreatedDate</th>
                <th>Action</th>
            </thead>
            <tbody>
                <?php if (!$shippings): ?>
                <tr>
                    <td>No Record Found</td>
                </tr>
                <?php else: ?>
                <?php foreach ($shippings->getData() as $key => $shipping): ?>

                <tr>
                    <td><?php echo $shipping->id ?></td>
                    <td><?php echo $shipping->name ?></td>
                    <td><?php echo $shipping->code ?></td>
                    <td><?php echo $shipping->amount ?></td>
                    <td><?php echo $shipping->description ?></td>
                    <?php if ($shipping->status == 1) {?>
                    <td><span class="status text-success">&bull;</span><?php echo 'Enable' ?></td>
                    <?php } else {?>
                    <td><span class="status text-warning">&bull;</span><?php echo 'Disable' ?></td>
                    <?php }?>
                    <td><?php echo $shipping->createdDate ?></td>
                    <td>
                        <div class="buttons">
                            <a onclick="object.setUrl('<?php echo $this->getUrl()->getUrl('form', 'Shipping', ['id' => $shipping->id]) ?>').resetParams().load(); "
                                class="edit" title="Edit" data-toggle="tooltip"><i class="material-icons"
                                    onclick="myFunction()">edit</i></a>
                            <a onclick="object.setUrl('<?php echo $this->getUrl()->getUrl('delete', 'Shipping', ['id' => $shipping->id]) ?>').resetParams().load(); "
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