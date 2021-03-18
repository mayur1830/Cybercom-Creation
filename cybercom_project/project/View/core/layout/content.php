<?php
$children = $this->getChildren();

foreach ($children as $child) {
    echo $child->toHtml();
}
?>
<div id="contentHtml">
</div>
<script>
var object = new Base();

object.setParam({
    'name': 'mayur'
});
object.setUrl('http://localhost/mayur/mvc/?a=gridHtml&c=Product');
console.log(object);
</script>