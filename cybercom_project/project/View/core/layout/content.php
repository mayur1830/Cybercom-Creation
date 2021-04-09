<div id="contentHtml">
    <?php

$children = $this->getChildren();

foreach ($children as $child) {
    $child->toHtml();
}

?>
    <script>
    var object = new Base();
    </script>
</div>