<?php require_once "../../controller/products/top_rated_products_controller.php" ?>

<!DOCTYPE HTML>
<html>
<head>
    <title>MagBuy Home</title>
    <link rel="shortcut icon" href="../../web/uploads/magbuy/favicon.ico" type="image/x-icon">
    <link rel="icon" href="../../web/uploads/magbuy/favicon.ico" type="image/x-icon">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="keywords" content="Nuevo Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template,
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design"/>
    <script type="applijegleryion/x-javascript">
         addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); }
    </script>
    <link href="../../web/assets/css/bootstrap.css" rel='stylesheet' type='text/css'/>
    <!-- Custom Theme files -->
    <link href="../../web/assets/css/style.css" rel='stylesheet' type='text/css'/>
    <script src="../../web/assets/js/jquery-1.11.1.min.js"></script>
    <!-- start menu -->
    <link href="../../web/assets/css/megamenu.css" rel="stylesheet" type="text/css" media="all"/>
    <script type="text/javascript" src="../../web/assets/js/megamenu.js"></script>
    <script>$(document).ready(function () {
            $(".megamenu").megamenu();
        });</script>
    <script src="../../web/assets/js/menu_jquery.js"></script>
    <script src="../../web/assets/js/simpleCart.min.js"></script>
    <!--web-fonts-->
    <link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,400italic,300italic,600,700' rel='stylesheet'
          type='text/css'>
    <link href='//fonts.googleapis.com/css?family=Roboto+Slab:300,400,700' rel='stylesheet' type='text/css'>
    <!--//web-fonts-->
    <script src="../../web/assets/js/scripts.js" type="text/javascript"></script>
    <script src="../../web/assets/js/modernizr.custom.js"></script>
    <script type="text/javascript" src="../../web/assets/js/move-top.js"></script>
    <script type="text/javascript" src="../../web/assets/js/easing.js"></script>
    <!--/script-->
    <script type="text/javascript">
        jQuery(document).ready(function ($) {
            $(".scroll").click(function (event) {
                event.preventDefault();
                $('html,body').animate({scrollTop: $(this.hash).offset().top}, 900);
            });
        });
    </script>

</head>
<body>
<?php
require_once "../elements/header.php";
require_once "../elements/navigation.php";
?>
<!--start-content-->

<!--/start-fashion-->
<div class="fashion-section">
    <div class="container">
        <h3 class="tittle">TOP RATED</h3>

        <div class="fashion-info">

            <?php foreach ($topRated as $product) { ?>

            <div class="col-md-4 fashion-grids">
                <figure class="effect-bubba">
                    <img src="<?= $product['image_url'] ?>" alt=""/>
                    <figcaption>
                        <h4><?= $product['title'] ?></h4>
                        <p class="cart"><a href="single.php?pid=<?= $product['id']?>">Shop</a></p>
                    </figcaption>
                </figure>
            </div>

            <?php } ?>
            <div class="clearfix"></div>
        </div>
    </div>
</div>
<!--//fashion-->
<!--/start-latest-->
<div class="collection-section">
    <div class="container">
        <h3 class="tittle fea">FEATURED COLLECTIONS</h3>

        <div class="fashion-info">
            <div class="col-md-4 fashion-grids">
                <figure class="effect-bubba">
                    <img src="../../web/assets/images/f4.jpg" alt=""/>
                    <figcaption>
                        <h4>Nuevo Shop</h4>
                        <p class="cart"><a href="single.php">Shop</a></p>
                    </figcaption>
                </figure>
            </div>
            <div class="col-md-4 fashion-grids">
                <figure class="effect-bubba">
                    <img src="../../web/assets/images/f5.jpg" alt=""/>
                    <figcaption>
                        <h4>Nuevo Shop</h4>
                        <p class="cart"><a href="single.php">Shop</a></p>
                    </figcaption>
                </figure>
            </div>
            <div class="col-md-4 fashion-grids">
                <figure class="effect-bubba">
                    <img src="../../web/assets/images/f6.jpg" alt=""/>
                    <figcaption>
                        <h4>Nuevo Shop</h4>
                        <p class="cart"><a href="single.php">Shop</a></p>
                    </figcaption>
                </figure>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
</div>
<!--//latest-->

<div class="mid-content">
    <div class="container">
        <div class="middle">
            <div class="mid-top">
                <h3>Discover a huge assortment of</h3>
                <p>women`s handbags at the lowest prices</p>
            </div>
        </div>
    </div>
</div>
<!--start-bottom-->
<!--start-image-cursuals-->
<?php
require_once "../elements/footer.php";
?>
<!--//end-copyright-->
<!--end-footer-->
<!--//end-content-->
<!--start-smooth-scrolling-->
<script type="text/javascript">
    $(document).ready(function () {
        /*
         var defaults = {
         containerID: 'toTop', // fading element id
         containerHoverID: 'toTopHover', // fading element hover id
         scrollSpeed: 1200,
         easingType: 'linear'
         };
         */

        $().UItoTop({easingType: 'easeOutQuart'});

    });
</script>
<a href="#home" id="toTop" class="scroll" style="display: block;"> <span id="toTopHover"
                                                                         style="opacity: 1;"> </span></a>


</body>
</html>