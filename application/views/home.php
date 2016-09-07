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

                            <div class="dropdown-menu form-registration stop-propagation hide" role="menu">
                              <div class="form-header">
                                  <h4>Registration</h2>
                                  <a href="">Already have an account?</a>
                              </div>
                              <div class="form-body material">
                                  <div class="form-group clearfix">
                                      <div class="pull-left margin-right-15">
                                          <i class="icon-mobile"></i>
                                      </div>
                                      <div class="pull-right">
                                          <label for="">Mobile No.</label>
                                          <input type="email" class="form-control" id="" placeholder="Enter your mobile number" />
                                      </div>
                                  </div>
                                  <div class="form-group full-width clearfix ">
                                    <button type="submit" class="btn btn-primary-blue pull-right">
                                         Generate OTP
                                    </button>
                                  </div>
                                  <div class="form-group full-width">
                                      <a href="" class="italic-text font-11 text-left ">* You can find OTP in your registered mobile number, which is
valid for next 15:00 min.</a>
                                  </div>
                              </div>
                            </div>

                            <!-- ./ Registration step 1 - generate OTP -->

                            <!-- Registration step 2 - enter OTP and register-->

                            <div class="dropdown-menu form-registration stop-propagation" role="menu">
                              <div class="form-header">
                                  <h4>Registration</h2>
                                  <a href="">Already have an account?</a>
                              </div>
                              <div class="form-body material">
                                  <div class="form-group clearfix">
                                      <div class="pull-left margin-right-15">
                                          <i class="icon-mobile"></i>
                                      </div>
                                      <div class="pull-right">
                                          <label for="">Mobile No.</label>
                                          <input type="email" class="form-control" id="" placeholder="Enter your mobile number" />
                                      </div>
                                  </div>
                                  <div class="form-group clearfix">
                                      <div class="pull-left margin-right-15">
                                          <i class="icon-password"></i>
                                      </div>
                                      <div class="pull-right">
                                          <label for="">One Time Password</label>
                                          <input type="email" class="form-control" id="" placeholder="Enter 6 digit OTP" />
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
                                                  <input type="radio" id="inlineRadio1" value="option1" name="radioInline" checked="">
                                                  <label for="inlineRadio1"> Student</label>
                                              </div>
                                              <div class="radio radio-inline">
                                                  <input type="radio" id="inlineRadio2" value="option1" name="radioInline" checked="">
                                                  <label for="inlineRadio2"> Trainer</label>
                                              </div>
                                              <div class="radio radio-inline">
                                                  <input type="radio" id="inlineRadio3" value="option1" name="radioInline" checked="">
                                                  <label for="inlineRadio3"> Institute</label>
                                              </div>
                                          </div>
                                      </div>
                                  </div>
                                  <div class="form-group full-width clearfix ">
                                    <p class="pull-left font-10 otp-counter">
                                        00:18
                                    </p>
                                    <button type="submit" class="btn btn-primary-blue pull-right">
                                         Register
                                    </button>
                                    <button type="submit" disabled="disabled" class="btn btn-secondary pull-right margin-right-5">
                                         Resend
                                    </button>
                                  </div>
                                  <div class="form-group full-width">
                                      <p class="italic-text font-11 text-left ">
                                          * Please provide OTP to continue authentication. Press RESEND if you will not get OTP in next 30sec. Onclick of REGISTRATION
you will find registration page to build relationship with us.</p>
                                  </div>
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
                        alert(1);
                        location.href = output.location;
                    } else {
                        $('.login_error').html(output.message);    
                    }
                }
            }
        })
    });

</script>
</body>

</html>
