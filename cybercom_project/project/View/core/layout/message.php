<div id="messageHtml">
    <?php
if ($success = $this->getMessage()->getSuccess()) {$this->getMessage()->clearSuccess();?>
    <script>
    Swal.fire({
        icon: 'success',
        title: '<?php echo $success ?>',
    })
    </script>
    <?php }if ($failure = $this->getMessage()->getFailure()) {$this->getMessage()->clearFailure();?>
    <script>
    Swal.fire({
        icon: 'error',
        title: '<?php echo $failure ?>',
    })
    </script>
    <?php }?>
</div>