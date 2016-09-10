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
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                             Login
                             </a>
                        <div class="dropdown-menu form-login stop-propagation" role="menu">
                            <div class="form-header">
                                <h4>Login</h2>
                                  <a href="">Do you have an account?</a>
                              </div>
                              <div class="form-body material">
                              <form id="frm_login" method="post">
                                  <div class="login_error"></div>
                                  <div class="form-group clearfix">
                                      <div class="pull-left margin-right-15">
                                          <i class="icon-user"></i>
                                      </div>
                                      <div class="pull-right">
                                          <label for="">User Name</label>
                                          <input type="email" class="form-control" placeholder="Enter Your Email ID/ Mobile No" name="login[email]" />
                                      </div>
                                  </div>
                                  <div class="form-group clearfix">
                                      <div class="pull-left margin-right-15">
                                          <i class="icon-password"></i>
                                      </div>
                                      <div class="pull-right">
                                          <label for="">Password</label>
                                          <input type="password" class="form-control" placeholder="Enter Password" name="login[password]" />
                                      </div>
                                  </div>
                                  <div class="form-group full-width clearfix ">
                                      <div class="checkbox stop-propagation pull-left">
                                            <input id="checkbox1" type="checkbox">
                                            <label for="checkbox1">
                                                Keep me logged in.
                                            </label>
                                        </div>
                                        <button class="btn btn-primary-blue pull-right js-login_btn">
                                             Login
                                        </button>
                                  </div>
                                  <div class="form-group full-width">
                                      <a href="" class="italic-text text-right font-12 font-blue">Forget your password?</a>
                                  </div>
                              </form>
                              </div>

                            </div>
                          </li>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                             register
                            </a>
                            <!-- Registration step 1 - generate OTP -->

                            <div class="dropdown-menu form-registration stop-propagation" id="js-otp_step_1" role="menu">
                              <div class="form-header">
                                  <h4>Registration</h2>
                                  <a href="">Already have an account?</a>
                              </div>
                              <div class="form-body material">
                              <form id="frm_otp" method="post">
                              <div class="otp_error"></div>
                                  <div class="form-group clearfix">
                                      <div class="pull-left margin-right-15">
                                          <i class="icon-mobile"></i>
                                      </div>
                                      <div class="pull-right">
                                          <label for="">Mobile No.</label>
                                          <input type="text" class="form-control" name="otp[mobile_number]" placeholder="Enter your mobile number" />
                                      </div>
                                  </div>
                                  <div class="form-group full-width clearfix ">
                                    <button type="submit" class="btn btn-primary-blue pull-right js-generate_otp">
                                         Generate OTP
                                    </button>
                                  </div>
                                  <div class="form-group full-width">
                                      <a href="" class="italic-text font-11 text-left ">* You can find OTP in your registered mobile number, which is
valid for next 15:00 min.</a>
                                  </div>
                              </form>
                              </div>
                            </div>

                            <!-- ./ Registration step 1 - generate OTP -->

                            <!-- Registration step 2 - enter OTP and register-->

                            <div class="dropdown-menu form-registration stop-propagation hide" id="js-otp_step_2" role="menu">
                              <div class="form-header">
                                  <h4>Registration</h2>
                                  <a href="">Already have an account?</a>
                              </div>
                              <div class="form-body material">
                               <form id="frm_otp_2" method="post">
                               <div class="otp_2_error"></div>
                                  <div class="form-group clearfix">
                                      <div class="pull-left margin-right-15">
                                          <i class="icon-mobile"></i>
                                      </div>
                                      <div class="pull-right">
                                          <label for="">Mobile No.</label>
                                          <input type="text" class="form-control" id="js-otp_mobile_2" placeholder="Enter your mobile number" name="otp_2[mobile_number]" />
                                      </div>
                                  </div>
                                  <div class="form-group clearfix">
                                      <div class="pull-left margin-right-15">
                                          <i class="icon-password"></i>
                                      </div>
                                      <div class="pull-right">
                                          <label for="">One Time Password</label>
                                          <input type="text" class="form-control" name="otp_2[otp_number]" placeholder="Enter 4 digit OTP" />
                                      </div>
                                  </div>
                                  <div class="form-group full-width clearfix ">
                                      <div class="pull-left margin-right-15">
                                          <i class="icon-mobile"></i>
                                      </div>
                                      <div class="pull-right">
                                          <label class="margin-bottom-10">I am</label>
                                          <div>
                                              <div class="radio radio-inline">
                                                  <input type="radio" id="inlineRadio1" name="otp_2[user_type]" checked="true" value="2">
                                                  <label for="inlineRadio1"> Student</label>
                                              </div>
                                              <div class="radio radio-inline">
                                                  <input type="radio" id="inlineRadio2" name="otp_2[user_type]" checked="" value="3">
                                                  <label for="inlineRadio2"> Trainer</label>
                                              </div>
                                              <div class="radio radio-inline">
                                                  <input type="radio" id="inlineRadio3" name="otp_2[user_type]" checked="" value="4">
                                                  <label for="inlineRadio3"> Institute</label>
                                              </div>
                                          </div>
                                      </div>
                                  </div>
                                  <div class="form-group full-width clearfix ">
                                    <p class="pull-left font-10 otp-counter">
                                        00:18
                                    </p>
                                    <button type="submit" class="btn btn-primary-blue pull-right js-otp_step_2">
                                         Register
                                    </button>
                                    <button type="submit" class="btn btn-secondary pull-right margin-right-5 js-resend_otp">
                                         Resend
                                    </button>
                                  </div>
                                  <div class="form-group full-width">
                                      <p class="italic-text font-11 text-left ">
                                          * Please provide OTP to continue authentication. Press RESEND if you will not get OTP in next 30sec. Onclick of REGISTRATION
you will find registration page to build relationship with us.</p>
                                  </div>
                              </form>
                              </div>
                            </div>

                            <!-- ./ Registration step 2 - enter OTP and register -->
                          </li>
                    </ul>
                </div>
                <!--/.nav-collapse -->
            </div>
                <!--/.nav-collapse -->
            </div>
        </nav>
        <button type="button" id="js-register_2" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#register-student-popup">
          open student registration
        </button>
        <button type="button" id="js-register_3" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#register-teacher-popup">
          open teacher registration
        </button>
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
                                <button type="button" class="btn btn-default btn-circle btn-lg disabled">
                                    <i class="icon icon-search"></i>
                                </button>
                                <p>Search Trainers</p>
                            </li>
                            <li>
                                <button type="button" class="btn btn-default btn-circle btn-lg disabled">
                                    <i class="icon icon-video"></i>
                                </button>
                                <p>Watch Videos</p>
                            </li>
                            <li>
                                <button type="button" class="btn btn-default btn-circle btn-lg disabled">
                                    <i class="icon icon-hire"></i>
                                </button>
                                <p>Hire Them!</p>
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

    <!-- ******* Modal *******-->

    <!-- registration popup for student-->
        <div class="modal fade bs-example-modal-lg registration-popup" tabindex="-1" role="dialog" id="register-student-popup" aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <?php include('view_student_register.php'); ?>
        </div>
    <!-- ./ registration popup for student-->

    <!-- registration popup for teacher-->
        <div class="modal fade bs-example-modal-lg registration-popup" tabindex="-1" role="dialog" id="register-teacher-popup" aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <?php include('view_trainer_register.php'); ?>
        </div>
    <!-- ./ registration popup for teacher-->

    <!-- script references !-->
    <script src="public/js/jquery.min.js"></script>
    <script src="public/js/bootstrap.min.js"></script>


    <script src="public/js/script.js"></script>

    <script src='public/js/owl.carousel.js'></script>
    <script src='public/js/owl.custom.js'></script>

<script type="text/javascript">

    $(".js-login_btn").click(function(e){
        e.preventDefault();
        $.ajax ({
            type: "post",
            data: $( "#frm_login" ).serialize(),
            url: '<?=base_url()?>register/login',
            success: function(result) {
                output = JSON.parse(result);
                if(result) {
                    if( 'success' == output.type ) {
                        location.href = output.location;
                    } else {
                        $('.login_error').html(output.message);    
                    }
                }
            }
        })
    });

    $(".js-generate_otp").click(function(e){
        e.preventDefault();
        $.ajax ({
            type: "post",
            data: $( "#frm_otp" ).serialize(),
            url: '<?=base_url()?>register/generateOtp',
            success: function(result) {
                output = JSON.parse(result);
                if(result) {
                    if( 'success' == output.type ) {
                        $( "#js-otp_step_1" ).addClass( "hide" );
                        $( "#js-otp_step_2" ).removeClass( "hide" );
                        $( "#js-otp_mobile_2" ).val( output.mobile_number );
                    } else {
                        $('.otp_error').html(output.message);    
                    }
                }
            }
        })
    });

    $(".js-resend_otp").click(function(e){
        e.preventDefault();
        $.ajax ({
            type: "post",
            data: $( "#frm_otp" ).serialize(),
            url: '<?=base_url()?>register/generateOtp',
            success: function(result) {
                output = JSON.parse(result);
                if(result) {
                    if( 'success' == output.type ) {
                        $( "#js-otp_step_1" ).addClass( "hide" );
                        $( "#js-otp_step_2" ).removeClass( "hide" );
                        $( "#js-otp_mobile_2" ).val( output.mobile_number );
                    } else {
                        $('.otp_error').html(output.message);    
                    }
                }
            }
        })
    });

  $(".js-otp_step_2").click(function(e){
        e.preventDefault();
        $.ajax ({
            type: "post",
            data: $( "#frm_otp_2" ).serialize(),
            url: '<?=base_url()?>register/validateOtp',
            success: function(result) {
                output = JSON.parse(result);
                if(result) {
                    if( 'success' == output.type ) {
                        $( "#js-register_"+output.user_type ).trigger( 'click' );
                        $( "#js-stud_reg_mob" ).val( output.mobile_number );
                    } else {
                        $('.otp_2_error').html(output.message);    
                    }
                }
            }
        })
    });
    
    $('.js-agree_terms').click(function(){
        if( this.checked ) {
            $(".js-btn_reg_student").removeAttr('disabled');
        } else {
            $(".js-btn_reg_student").attr('disabled','disabled');
        }
    });

    $(".js-btn_reg_student").click(function(e){
        e.preventDefault();
        $.ajax ({
            type: "post",
            data: $( "#frm_reg_student" ).serialize(),
            url: '<?=base_url()?>register/signup',
            success: function(result) {
                output = JSON.parse(result);
                if(result) {
                    if( 'success' == output.type ) {
                        location.href = output.location;
                    } else {
                        $('.stud_register_error').html(output.message);    
                    }
                }
            }
        })
    });

</script>
</body>

</html>
