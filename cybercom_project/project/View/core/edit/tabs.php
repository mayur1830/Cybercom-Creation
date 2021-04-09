<?php
$tabs = $this->getTabs();
foreach ($tabs as $key => $tab) {
    if (!$this->getRequest()->getGet('id')) {
        continue;
    } else {
        ?>

<a class="tab-btn"
    onclick="object.setUrl('<?php echo $this->getUrl()->getUrl(null, null, ['tab' => $key]); ?>').resetParams().load();"><?php echo $tab['label'] ?></a>
<?php
}}
?>