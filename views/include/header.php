<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="public/images/tieu_de.jpg">

    <title><?php echo $title ?></title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Your existing stylesheets -->
    <link href="public/css/style.css" rel="stylesheet" type="text/css" media="all" />
    <link href="public/css/memenu.css" rel="stylesheet" type="text/css" media="all" />



    <!-- Your existing HTML content -->

    <!-- Bootstrap JS, Popper.js, and jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.4.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js"></script>

    <!-- Other scripts -->
    <script src="public/js/simpleCart.min.js"></script>
    <script src="public/js/memenu.js"></script>
    <script src="public/js/responsiveslides.min.js"></script>
    <script src="public/js/lienhe.js"></script>
    <script src="public/js/thu_vien_ajax.js"></script>
    <script src="public/js/kiemtra.js"></script>

    <script>
        $(document).ready(function () {
            $(".memenu").memenu();
        });
    </script>

    <script>
        $(function () {
            $("#slider").responsiveSlides({
                auto: true,
                nav: true,
                speed: 500,
                namespace: "callbacks",
                pager: false,
            });
        });
    </script>

</head>