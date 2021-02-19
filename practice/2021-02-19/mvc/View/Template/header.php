<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Bootstrap User Management Data Table</title>
    <link rel="stylesheet" href="http://localhost/mayur/mvc/View/Template/css/style.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

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
        <!-- Collection of nav links, forms, and other content for toggling -->
        <div id="navbarCollapse" class="collapse navbar-collapse justify-content-start">

            <div class="navbar-nav mr-auto">
                <a href="#" class="nav-item nav-link active"><i class="fa fa-home"></i><span>Home</span></a>
                <a href="http://localhost/mayur/mvc/?a=grid&c=product" class="nav-item nav-link"><i
                        class="fa fa-gears"></i><span>Products</span></a>
                <a href="http://localhost/mayur/mvc/?a=grid&c=category" class="nav-item nav-link"><i
                        class="fa fa-users"></i><span>Category</span></a>
                <a href="" class="nav-item nav-link"><i class="fa fa-user"></i><span>Customer</span></a>

                <div class="nav-item dropdown ">
                    <a href="#" data-toggle="dropdown" class="nav-item nav-link active dropdown-toggle user-action"><img
                            src="http://localhost/mayur/mvc/View/Template/image/mayur.jpg" class="avatar" alt="Avatar">
                        Mayur Chavda <b class="caret"></b></a>
                    <div class="dropdown-menu">
                        <a href="#" class="dropdown-item"><i class="fa fa-user-o"></i> Profile</a>
                        <a href="#" class="dropdown-item"><i class="fa fa-calendar-o"></i> Calendar</a>
                        <a href="#" class="dropdown-item"><i class="fa fa-sliders"></i> Settings</a>
                        <div class="divider dropdown-divider"></div>
                        <a href="#" class="dropdown-item"><i class="material-icons">&#xE8AC;</i> Logout</a>
                    </div>
                </div>
            </div>
        </div>
    </nav>
</body>

</html>