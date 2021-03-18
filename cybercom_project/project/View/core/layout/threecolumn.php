<table width="100%" cellspacing="0px" align="center">
    <tbody>
        <tr>
            <?php
echo $this->createBlock('Block\Core\Layout\Header')->toHtml();

?>
        </tr>
        <tr>
            <td><?php echo $this->createBlock('Block\Core\Layout\Message')->toHtml(); ?></td>
        </tr>
        <tr>
            <td width="150px"><?php echo $this->getChild('left')->toHtml(); ?></td>

            <td><?php
$content = $this->getChild('content');
echo $content->toHtml();
?></td>

            <td width="150px"></td>
        </tr>
        <tr>
            <td colspan="3"></td>
        </tr>

    </tbody>

</table>