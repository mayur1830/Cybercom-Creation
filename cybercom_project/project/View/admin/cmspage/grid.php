<?php $cmsPages = $this->getcmsPages();?>
<div class="table-responsive">
    <div class="table-wrapper">
        <div class="table-title">
            <div class="row">
                <div class="col-sm-5">
                    <h2>CMS Page Details</h2>
                </div>
                <div class="col-sm-7">
                    <a onclick="object.setUrl('<?php echo $this->getUrl()->getUrl('form', 'CmsPage', [], true) ?>').resetParams().load(); "
                        class="btn btn-secondary"><i class="material-icons">&#xE147;</i> <span>Add New
                            CmsPage</span></a>
                </div>
            </div>
        </div>
        <table class="table table-striped table-hover">
            <thead align="center">
                <th>Id</th>
                <th>Title</th>
                <th>Identifier</th>
                <th>Status</th>
                <th>CreatedDate</th>
                <th>Action</th>
            </thead>
            <tbody align="center">
                <?php if (!$cmsPages): ?>
                <tr>
                    <td colspan="11" al>No Record Found</td>
                </tr>
                <?php else: ?>
                <?php

foreach ($cmsPages->getData() as $key => $cmsPage):
?>
                <tr>
                    <td><?php echo $cmsPage->id ?></td>
                    <td><?php echo $cmsPage->title ?></td>
                    <td><?php echo $cmsPage->identifier ?></td>
                    <?php if ($cmsPage->status == 1) {?>
                    <td><span class="status text-success">&bull;</span><?php echo 'Enable' ?></td>
                    <?php } else {?>
                    <td><span class="status text-warning">&bull;</span><?php echo 'Disable' ?></td>
                    <?php }?>
                    <td><?php echo $cmsPage->createdDate ?></td>
                    <td>
                        <div class="buttons">
                            <a onclick="object.setUrl('<?php echo $this->getUrl()->getUrl('form', 'CmsPage', ['id' => $cmsPage->id]) ?>').resetParams().load(); "
                                class="edit" title="Edit" data-toggle="tooltip"><i class="material-icons"
                                    onclick="myFunction()">edit</i></a>
                            <a onclick="object.setUrl('<?php echo $this->getUrl()->getUrl('delete', 'CmsPage', ['id' => $cmsPage->id]) ?>').resetParams().load(); "
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