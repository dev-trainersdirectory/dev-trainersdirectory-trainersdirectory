<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <title>Trainers Direvtory </title>
    <base href="<?=base_url()?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link href="public/css/font-awesome.min.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>
    <link href="public/css/style.css" rel="stylesheet">

    <link rel='stylesheet' href='public/css/owl.carousel.css'>



    <!--[if lt IE 9]>
    <script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

</head>

<body>
        <nav class="navbar navbar-default">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <!-- <a class="navbar-brand" href="#">Project name</a> -->
                </div>
                <div id="navbar" class="navbar-collapse collapse">

                    <ul class="nav navbar-nav navbar-right top-right-navigation">
                        <li><a href="register/login">LOGIN</a></li>
                        <li><a href="register/signup">REGISTER</a></li>
                    </ul>
                </div>
                <!--/.nav-collapse -->
            </div>
        </nav>
        <div class="container search-container">
            <div class="row">
                <div class="">
                    <div class="text-center logo">
                        <img src="public/images/trainers-directory-logo.png">
                    </div>
                    <div class="col-md-12">
                        <div class="input-group" id="adv-search">
                            <!--search box-->
                            <div class="left-inner-addon search-addon">
                                <i class="fa fa-search" aria-hidden="true"></i>
                                <input type="text" class="form-control search-box" placeholder="Your learning needs" />
                            </div>

                            <!-- ./search box-->
                            <?php include('search_filter.php'); ?>
                        </div>
                    </div>
                    <!--bottom marketing links-->
                    <div class="marketing">
                        <ul class="clearfix">
                            <li>
                                <button type="button" class="btn btn-default btn-circle btn-lg">
                                    <i class="icon icon-search"></i>
                                </button>
                                <a class="" href="#" role="button">Search Trainers</a>
                            </li>
                            <li>
                                <button type="button" class="btn btn-default btn-circle btn-lg">
                                    <i class="icon icon-video"></i>
                                </button>
                                <a class="" href="#" role="button">Watch Videos</a>
                            </li>
                            <li>
                                <button type="button" class="btn btn-default btn-circle btn-lg">
                                    <i class="icon icon-hire"></i>
                                </button>
                                <a class="" href="#" role="button">Hire Them!</a>
                            </li>
                        </ul>

                    </div>
                    <!-- / bottom marketing links-->
                </div>
            </div>
        </div>

    <!-- footer -->
    <div class="footer search-container-footer">
        <div class="container">
            <ul class="nav navbar-links navbar-left bottom-navigation-left pull-left">
                <li><a href="#">About Us</a>
                </li>
                <li><a href="#">Sitemap</a>
                </li>
                <li><a href="#">Terms &amp; Conditions</a>
                </li>
                <li><a href="#">Ads</a>
                </li>
            </ul>
            <div class="pull-right">
                <p class="text-right">© 2016 Trainers Directory</p>
            </div>
        </div>
        <a href="" class="more-info">
            <i class="icon-info" aria-hidden="true"></i>
        </a>
    </div>
    <!-- ./ footer -->
    <!-- script references !-->
    <script src="public/js/jquery.min.js"></script>
    <script src="public/js/bootstrap.min.js"></script>


    <script src="public/js/script.js"></script>

    <script src='public/js/owl.carousel.js'></script>
    <script src='public/js/owl.custom.js'></script>
</body>

</html>
