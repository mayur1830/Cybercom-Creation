<?php
$tabs = $this->getTabs();
foreach ($tabs as $key => $tab) {
    if (!$this->getRequest()->getGet('id')) {
        continue;
    } else {
        ?>

<a class="tab-btn"
    href="<?php echo $this->getUrl()->getUrl(null, null, ['tab' => $key]); ?>"><?php echo $tab['label'] ?></a>
<?php
}}
?>