<body>
    <div class="container-fluid px-0" style="overflow: hidden;">
        <div class="row no-gutters">
            <div class="col">
                <?php echo $this->createBlock('Block\Core\Layout\Header')->toHtml(); ?>
            </div>
        </div>
        <div class="row">

            <div class="col"><?php echo $this->createBlock('Block\Core\Layout\Message')->toHtml(); ?></div>
        </div>
        <div class="row">
            <div class="col">
                <?php echo $this->getChild('content')->toHtml(); ?>
            </div>
        </div>
        <div class="row">
            <div class="col">
            </div>
        </div>
    </div>
</body>