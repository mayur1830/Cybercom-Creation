<table width="100%">
    <tbody>
        <tr>
            <td colspan="3">
                <?php echo $this->createBlock('Block\Core\Layout\Header')->toHtml(); ?>

            </td>
        </tr>
        <tr>
            <td width="150px">
                <?php echo $this->getChild('left')->toHtml(); ?>
            </td>
            <td>
                <?php echo $this->getChild('content')->toHtml(); ?>
            </td>
            <td width="150px">
            </td>
        </tr>
        <tr>
            <td colspan="3">
            </td>
        </tr>
    </tbody>
</table>