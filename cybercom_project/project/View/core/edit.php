<div class="row">
    <div class="col-3 tabs"><?php $this->getTabHtml();?></div>
    <div class="col-9">
        <section class="get-in-touch">
            <form method="post" id="<?php echo $this->getFormId(); ?>" class="all-form row"
                action="<?php echo $this->getFormUrl(); ?>" enctype="multipart/form-data">
                <?php $this->getTabContent();?>

            </form>
        </section>
    </div>
</div>