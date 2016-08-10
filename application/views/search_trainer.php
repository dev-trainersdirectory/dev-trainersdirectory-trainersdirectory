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

    <div class="wrapper">
        <div class="header search-header">
            <nav class="navbar navbar-default" role="navigation">
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <div class="col-md-2">
                        <img src="public/images/trainers-directory-logo.png" class="logo">
                    </div>
                    <div class="col-sm-6 col-md-5 col-md-offset-2 no-padding">
                        Filter

                    </div>
                    <div id="navbar" class="navbar-collapse collapse">
                        <ul class="nav navbar-nav navbar-right top-right-navigation">
                            <li><a href="register/login">LOGIN</a></li>
                            <li><a href="register/signup">REGISTER</a></li>
                        </ul>
                    </div>
                </div>
                <!-- /.navbar-collapse -->
            </nav>

        </div>
        <div class="container-fulid search-filter-header card">
            <div class="container">
                <div class="row">
                    <div class="col-md-2 col-md-offset-1">
                        <div class="dropdown select-filter filtered">
                            <button class="btn select-trasnperant" data-toggle="dropdown">
                                Pune<i class="fa fa-chevron-down"></i>
                            </button>
                            <ul class="dropdown-menu">
                                <li><a tabindex="-1" href="#">Pune</a>
                                </li>
                                <li><a tabindex="-1" href="#">Mumbai</a>
                                </li>
                                <li><a tabindex="-1" href="#">Solapur</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="dropdown select-filter">
                            <button class="btn select-trasnperant" data-toggle="dropdown">
                                Related Area<i class="fa fa-chevron-down"></i>
                            </button>
                            <ul class="dropdown-menu">
                                <li><a tabindex="-1" href="#">Related Place</a></li>
                                <li><a tabindex="-1" href="#">Related City</a></li>
                                <li><a tabindex="-1" href="#">Related Subject</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="dropdown select-filter">
                            <button class="btn select-trasnperant" data-toggle="dropdown">
                                Related Area<i class="fa fa-chevron-down"></i>
                            </button>
                            <ul class="dropdown-menu">
                                <li><a tabindex="-1" href="#">Type</a></li>
                                <li><a tabindex="-1" href="#">Type one</a></li>
                                <li><a tabindex="-1" href="#">Type two</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="dropdown select-filter">
                            <button class="btn select-trasnperant" data-toggle="dropdown">
                                Experience<i class="fa fa-chevron-down"></i>
                            </button>
                            <ul class="dropdown-menu">
                                <li><a tabindex="-1" href="#">10 years</a></li>
                                <li><a tabindex="-1" href="#">30 years</a></li>
                                <li><a tabindex="-1" href="#">40 years</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="dropdown select-filter">
                            <button class="btn select-trasnperant" data-toggle="dropdown">
                                By Video<i class="fa fa-chevron-down"></i>
                            </button>
                            <ul class="dropdown-menu">
                                <li><a tabindex="-1" href="#">By Subject</a></li>
                                <li><a tabindex="-1" href="#">By Places</a></li>
                                <li><a tabindex="-1" href="#">By Area</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <button hidden="true" class="js-view_trainer_1" id="js-trainer_id" data-trainer_id="" data-toggle="modal" data-target="#myModal-view_trainer">Click</button>
        <div class="slider-row">
            <div id="owl2row-plugin" class="owl-carousel">
            <?php foreach( $trainers as $key => $trainer ) {
                $objNextTrainer = next($trainers);
                $objPrevTrainer = prev($trainers);
                print_r($objPrevTrainer);
                print_r($objNextTrainer);
            ?>
                <div class="item">
                    <div class="flip-container">
                        <div class="flipper">
                            <div class="front show">
                                <div class="trainer-panel widget">
                                    <div class="widget-header bg-success text-right">
                                        <div class="dropdown">
                                            <button class="more-details-dropdown btn-transparent font-20 dropdown-toggle" type="button" data-toggle="dropdown">
                                                <i class="icon-dots"></i>
                                            </button>
                                            <ul class="dropdown-menu more-details-dropdown-conainter">
                                                <li><a href="#" class="trainer-introduction more-details">Introduction</a></li>
                                                <li class="divider"></li>
                                                <li><a href='#' id="<?php echo $key; ?>" onclick="setValue(<?php echo $key; ?>);" class="js-view_trainer" data-toggle="modal" data-target="#myModal-view_user" >Details</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="widget-body text-center">
                                        <!--trainer profile picture-->
                                        <div class="trainer-profile-pic">
                                            <a href="#trainer-view" data-toggle="modal">
                                                <img alt="Profile Picture" class="rounded" id="image-1" src="<?php echo base_url() . $trainer->getProfilePic() ?>">
                                            </a>
                                        </div>
                                        <!-- / trainer profile picture-->
                                        <!--ratings-->
                                        <div class="rating">
                                        <?php for( $count = 0; $count < $trainer->getRating(); $count++ ) { ?>
                                        <i class="icon-star-sm active one-rating"></i>
                                        <?php } ?>
                                        </div>
                                        <!-- / ratings-->
                                        <!-- trainer details -->
                                        <h3 class="trainer-name"><?php echo $trainer->getName();?></h3>
                                        <p class="trainer-profession">English Trainer</p>
                                        <p class="trainer-subjects"><?php echo $trainer->getSkills();?></p>
                                        <!-- / trainer details -->
                                        <!-- social details -->
                                        <div class="trainer-social">
                                            <a class="" href="#"><i class="icon-call"></i></a>
                                            <a class="" href="#"><i class="icon-msgs"></i></a>
                                            <a class="" href="#"><i class="icon-likes"></i></a>
                                            <a class="" href="#"><i class="icon-watched"></i><span class="watch-count">(<?php echo $trainer->getViews();?>)</span></a>
                                        </div>
                                        <!-- / social details -->
                                    </div>
                                </div>
                            </div>
                            <div class="back hide">
                                <div class="trainer-panel details-page">
                                    <div class="widget-header bg-success text-right">
                                        <div class="dropdown">
                                            <button class="more-details-dropdown btn-transparent font-20 dropdown-toggle" type="button" data-toggle="dropdown">
                                                <i class="icon-dots"></i>
                                            </button>
                                            <ul class="dropdown-menu more-details-dropdown-conainter">
                                                <li><a href="#" class="trainer-introduction more-details">Introduction</a>
                                                </li>
                                                <li class="divider"></li>
                                                <li><a href="#trainer-view" class="js-view_trainer" data-toggle="modal">Details</a>
                                                </li>
                                            </ul>
                                        </div>
                                        <h3 class="">About Trainer
                                        </h3>
                                    </div>
                                    <div class="widget-body">
                                        <p>
                                           <?php echo $trainer->getDescription();?>
                                        </p>
                                        <!-- / social details -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
            </div>
        </div>

    </div>
    <!-- footer -->
    <footer class="footer">
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
    </footer>
    <!-- ./ footer -->
    <!-- test slider demo-->
    <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" id="myModal-view_trainer" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    
    </div>

    <!-- script references !-->
    <script src="<?=base_url()?>public/admin/js/jquery.js"></script>
    <script src="public/js/jquery.min.js"></script>
    <script src="public/js/bootstrap.min.js"></script>

    <script src="public/js/script.js"></script>

    <script src='public/js/owl.carousel.js'></script>
    <script src='public/js/owl.custom.js'></script>

    <script type="text/javascript">

    function setValue(id) {
        $("#js-trainer_id").data("trainer_id", id)
        $("#js-trainer_id").trigger("click");
    }
    
    $(".js-view_trainer_1").click(function(){
    $('#trainer-view').html('<div align="center"><img align="center" src="<?=base_url()?>public/images/load.gif"></div>');
        $.ajax ({
            type: "post",
            data: { id: $("#js-trainer_id").data("trainer_id") },
            url: '<?=base_url()?>csearchtrainercontroller/viewTrainer',
            success: function(result) {
                if(result) {
                    $('#myModal-view_trainer').html(result);
                }
            }
        })
    });

</script>
</body>

</html>
