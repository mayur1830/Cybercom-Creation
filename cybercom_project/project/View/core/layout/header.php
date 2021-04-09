<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Welcome</title>
    <link rel="stylesheet" href="http://localhost/mayur/project/skin/admin/css/style.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="<?php echo $this->subUrl('skin/admin/js/jquery-3.6.0.js'); ?>"></script>
    <script src="<?php echo $this->subUrl('skin/admin/js/mage.js'); ?>"></script>
    <script src="<?php echo $this->subUrl('skin/admin/ckeditor/ckeditor.js') ?>"></script>

    <script>
    $(document).ready(function() {
        $('[data-toggle="tooltip"]').tooltip();
    });
    </script>
</head>

<body>
    <nav class="navbar navbar-expand-xl navbar-dark ">
        <a href="#" class="navbar-brand"><i class="fa fa-cube"></i>Ecommerce<b>Website</b></a>
        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div id="navbarCollapse" class="collapse navbar-collapse justify-content-start">
            <div class="navbar-nav mr-auto">
                <a onclick="object.setUrl('<?php echo $this->getUrl()->getUrl('gridHtml', 'Product') ?>').resetParams().load(); "
                    class="nav-item nav-link"><i class="fa fa-gears"></i><span>Products</span></a>
                <a onclick="object.setUrl('<?php echo $this->getUrl()->getUrl('gridHtml', 'Category') ?>').resetParams().load(); "
                    class="nav-item nav-link"><i class="fa fa-rocket"></i><span>Category</span></a>
                <a onclick="object.setUrl('<?php echo $this->getUrl()->getUrl('gridHtml', 'Customer') ?>').resetParams().load(); "
                    class="nav-item nav-link"><i class="fa fa-users"></i><span>Customer</span></a>
                <a onclick="object.setUrl('<?php echo $this->getUrl()->getUrl('gridHtml', 'CustomerGroup') ?>').resetParams().load(); "
                    class="nav-item nav-link"><i class="fa fa-users"></i><span>CustomerGroup</span></a>
                <a onclick="object.setUrl('<?php echo $this->getUrl()->getUrl('gridHtml', 'Shipping') ?>').resetParams().load(); "
                    class="nav-item nav-link"><i class="fa fa-truck"></i><span>Shipping</span></a>
                <a onclick="object.setUrl('<?php echo $this->getUrl()->getUrl('gridHtml', 'Payment') ?>').resetParams().load(); "
                    class="nav-item nav-link"><i class="fa fa-inr"></i><span>Payment</span></a>
                <a onclick="object.setUrl('<?php echo $this->getUrl()->getUrl('gridHtml', 'Admin') ?>').resetParams().load(); "
                    class="nav-item nav-link"><i class="fa fa-user"></i><span>Admin</span></a>
                <a onclick="object.setUrl('<?php echo $this->getUrl()->getUrl('gridHtml', 'CmsPage') ?>').resetParams().load(); "
                    class="nav-item nav-link"><i class="fa fa-file-text-o"></i><span>CmsPage</span></a>
                <a onclick="object.setUrl('<?php echo $this->getUrl()->getUrl('gridHtml', 'Attribute') ?>').resetParams().load(); "
                    class="nav-item nav-link"><i class="fa fa-thermometer-full"></i><span>Attribute</span></a>
                <a onclick="object.setUrl('<?php echo $this->getUrl()->getUrl('gridHtml', 'ConfigGroup') ?>').resetParams().load(); "
                    class="nav-item nav-link"><i class="fa fa-thermometer-full"></i><span>Configration</span></a>
                <a onclick="object.setUrl('<?php echo $this->getUrl()->getUrl('gridHtml', 'Order') ?>').resetParams().load(); "
                    class="nav-item nav-link"><i class="fa fa-thermometer-full"></i><span>Order</span></a>
            </div>
        </div>
    </nav>
</body>

</html>
<script>
var object = new Base();
</script>