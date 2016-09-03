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

    <script src="<?=base_url()?>public/admin/js/jquery.js"></script>
    <script src="public/js/jquery.min.js"></script>

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
                        <!-- search group-->
                        <div class="input-group material search-box-container">
                            <!--search box-->
                            <i class="icon-search-sm" aria-hidden="true"></i>
                            <input type="text" class="form-control header-search-box" placeholder="Search learning needs">
                            <!--/ search box-->
                            <?php include('search_filter_result_page.php'); ?>
                            
                        </div>
                        <!-- / search group -->
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
                <form id="frm_filter_trainer" method="post">
                    <div class="col-md-2 col-md-offset-1">
                        <div class="dropdown select-filter">
                            <button class="btn select-trasnperant" data-toggle="dropdown">
                                Location<i class="fa fa-chevron-down"></i>
                            </button>
                            <ul class="dropdown-menu" style="max-height: 500px; overflow-y:scroll; overflow-x: hidden;">
                            <?php foreach( $locations as $location ) {?>
                                <li class="js-location-dd">
                                <a tabindex="-1">
                                    <input type="checkbox" name="filter_trainer[locations][]" value="<?php echo $location->getId(); ?>" />
                                    <?php echo $location->getName(); ?>
                                </a>
                                </li>
                            <?php } ?>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="dropdown select-filter">
                            <button class="btn select-trasnperant" data-toggle="dropdown">
                                Time<i class="fa fa-chevron-down"></i>
                            </button>
                            <ul class="dropdown-menu" style="max-height: 500px; overflow-y:scroll; overflow-x: hidden;">
                            <?php foreach( $times as $time ) {?>
                                <li>
                                <a tabindex="-1">
                                    <input type="checkbox" name="filter_trainer[times][]" value="<?php echo $time->getId(); ?>" />
                                    <?php echo $time->getName(); ?>
                                </a>
                                </li>
                            <?php } ?>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="dropdown select-filter">
                            <button class="btn select-trasnperant" data-toggle="dropdown">
                                Preference<i class="fa fa-chevron-down"></i>
                            </button>
                            <ul class="dropdown-menu" style="max-height: 500px; overflow-y:scroll; overflow-x: hidden;">
                            <?php foreach( $preferences as $preference ) {?>
                                <li>
                                <a tabindex="-1">
                                    <input type="checkbox" name="filter_trainer[preferences][]" value="<?php echo $preference->getId(); ?>" />
                                    <?php echo $preference->getDescription(); ?>
                                </a>
                                </li>
                            <?php } ?>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="dropdown select-filter">
                            <button class="btn select-trasnperant" data-toggle="dropdown">
                                Rates<i class="fa fa-chevron-down"></i>
                            </button>
                            <ul class="dropdown-menu" style="max-height: 500px; overflow-y:scroll; overflow-x: hidden;">
                                <li>
                                    <a tabindex="-1">
                                    <input type="checkbox" name="filter_trainer[rates][]" value="1" />Below 500
                                    </a>
                                </li>
                                <li>
                                    <a tabindex="-1">
                                    <input type="checkbox" name="filter_trainer[rates][]" value="2" />500 to 1000
                                    </a>
                                </li>
                                <li>
                                    <a tabindex="-1">
                                    <input type="checkbox" name="filter_trainer[rates][]" value="3" />Above 1000
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <a class="btn js-filter_trainer">Search</a>
                        <input type="hidden" name="filter_trainer[subject_id]" value="<?php echo $subject_id; ?>" />
                        <input type="hidden" name="filter_trainer[city_id]" value="<?php echo $city_id; ?>" />
                    </div>
                </form>
                </div>
            </div>
        </div>
        <button hidden="true" class="js-view_trainer_1" id="js-trainer_id" data-trainer_id="" data-toggle="modal" data-target="#myModal-view_trainer">Click</button>
        
        <div class="slider-row">
    <div id="owl2row-plugin" class="owl-carousel">
    <?php $prevId = NULL; foreach( $trainers as $key => $trainer ) { ?>
        <div class="item">
            <button hidden="true" id="trainer_id_<?php echo $key; ?>" data-prev="<?php echo $prevId;?>" data-next=""></button>
            <script type="text/javascript"> $("#trainer_id_<?php echo $prevId; ?>").data("next", <?php echo $key; ?> ); </script>
            <div class="flip-container">
                <div class="flipper">
                    <div class="front show">
                        <div class="trainer-panel widget">
                            <div class="widget-header bg-success text-right">
                                
                            </div>
                            <div class="widget-body text-center">
                                <!--trainer profile picture-->
                                <div class="trainer-profile-pic">
                                    <a href='#' id="<?php echo $key; ?>" onclick="setValue(<?php echo $key; ?>);" class="js-view_trainer" data-toggle="modal" data-target="#myModal-view_user" >
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
                </div>
            </div>
        </div>
    <?php $prevId = $key; } ?>
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
    <script src="public/js/bootstrap.min.js"></script>

    <script src="public/js/script.js"></script>

    <script src='public/js/owl.carousel.js'></script>
    <script src='public/js/owl.custom.js'></script>

    <script type="text/javascript">

    function setValue(id) {
        $("#js-trainer_id").data("trainer_id", id);
        $("#js-trainer_id").trigger("click");
    }
    
    $(".js-view_trainer_1").click(function(){

    trainerID = $("#js-trainer_id").data("trainer_id");

    prevTrainerID = $("#trainer_id_"+trainerID ).data("prev");
    nextTrainerID = $("#trainer_id_"+trainerID ).data("next");

    $('#trainer-view').html('<div align="center"><img align="center" src="<?=base_url()?>public/images/load.gif"></div>');
        $.ajax ({
            type: "post",
            data: { id: trainerID },
            url: '<?=base_url()?>csearchtrainercontroller/viewTrainer',
            success: function(result) {
                if(result) {
                    $('#myModal-view_trainer').html(result);
                }
            }
        })
    });

    $(".js-filter_trainer").click(function(){
        $.ajax ({
            type: "post",
            data: $( "#frm_filter_trainer" ).serialize(),
            url: '<?=base_url()?>csearchtrainercontroller/filterTrainer',
            success: function(result) {
                if(result) {
                    $('#myModal-view_trainer').html(result);
                }
            }
        })
    });

    $(".js-location_textbox").keyup(function(){
        searchString = $(this).val();

        if( '' != searchString ) {
            $( ".js-location-dd" ).each(function( i ) {
                if( 0 == $( this ).text().indexOf( searchString ) ) {
                  alert(searchString);  $(this).remove();
                }
            });
        }
    });

   // $(".js-filter_trainer").trigger("click");

</script>
</body>

</html>
