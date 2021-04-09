<?php $configGroups = $this->getConfigGroups();?>
<div class="table-responsive">
    <div class="table-wrapper">
        <div class="table-title">
            <div class="row">
                <div class="col-sm-5">
                    <h2>Config Group Details</h2>
                </div>
                <div class="col-sm-7">
                    <a onclick="object.setUrl('<?php echo $this->getUrl()->getUrl('form', 'ConfigGroup', [], true) ?>').resetParams().load(); "
                        class="btn btn-secondary"><i class="material-icons">&#xE147;</i> <span>Add New
                            Config Group</span></a>
                </div>
            </div>
        </div>
        <table class="table table-striped table-hover">
            <thead align="center">


                <th>Id</th>
                <th>Name</th>
                <th>CreatedDate</th>
                <th>Action</th>
            </thead>
            <tbody align="center">
                <?php if (!$configGroups): ?>
                <tr>
                    <td colspan="4" al>No Record Found</td>
                </tr>
                <?php else: ?>
                <?php

foreach ($configGroups->getData() as $key => $congigGroup):
?>

                <tr>
                    <td><?php echo $congigGroup->groupId ?></td>
                    <td><?php echo $congigGroup->name ?></td>
                    <td><?php echo $congigGroup->createdDate ?></td>
                    <td>
                        <div class="buttons">
                            <a onclick="object.setUrl('<?php echo $this->getUrl()->getUrl('form', 'ConfigGroup', ['id' => $congigGroup->groupId]) ?>').resetParams().load(); "
                                class="edit" title="Edit" data-toggle="tooltip"><i class="material-icons"
                                    onclick="myFunction()">edit</i></a>
                            <a onclick="object.setUrl('<?php echo $this->getUrl()->getUrl('delete', 'ConfigGroup', ['id' => $congigGroup->groupId]) ?>').resetParams().load(); "
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