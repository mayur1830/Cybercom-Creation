<div id="leftHtml">
    <?php

$children = $this->getChildren();

foreach ($children as $child) {
    echo $child->toHtml();
}
//$this->getTabHtml();

?>
    <script>
    var object = new Base();
    </script>
</div>