<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="content-type" content="text/html; charset=UTF-8">
  <meta charset="utf-8">
  <title>Trainers Direvtory </title>
  <base href="<?=base_url()?>" />
  <meta name="generator" content="Bootply" />
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <link href="public/css/style.css" rel="stylesheet">
  <link href="public/css/font-awesome.min.css" rel="stylesheet">
  <link href='https://fonts.googleapis.com/css?family=Roboto+Condensed:400,400italic&subset=latin,greek,greek-ext' rel='stylesheet' type='text/css'>

  <!--[if lt IE 9]>
  <script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
  <![endif]-->
</head>
<body>
  <nav class="navbar navbar-default navbar-fixed-top">
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

        <ul class="nav navbar-nav navbar-right">
          <li><a href="register/login">LOGIN</a></li>
          <li><a href="register/signup">REGISTER</a></li>
        </ul>
      </div><!--/.nav-collapse -->
    </div>
  </nav>
  <!-- search box section-->
  <div class="jumbotron vertical-center">
    <div class="container text-center">
      <div class="row search-control">
        <div class="col-md-6 col-md-offset-3 no-padding">
          <!-- logo -->
          <div class="text-center logo">
						<img src="public/images/trainers-directory-logo.png">
					</div>
          <!-- / logo -->
          <div class="form-group col-md-10 no-padding">
            <!-- search group-->
            <div class="input-group">
              <!--search box-->
              <input type = "text" class = "form-control search-box">
              <!--/ search box-->
              <!-- search by catergory -->
              <div class="input-group-btn">
                <div class="btn-group" role="group">
                  <div class="dropdown dropdown-lg">
                    <button type="button" class="btn btn-default dropdown-toggle btn-category" data-toggle="dropdown" aria-expanded="false"><span class="caret"></span></button>
                    <div class="dropdown-menu dropdown-menu-right" role="menu">
                      <!-- drop down tab form-->
                      <form class="form-horizontal" role="form">
                        <!-- tabs names -->
                        <ul class="nav nav-pills">
                          <li class="active"><a data-toggle="pill" href="#menu1">Educational</a></li>
                          <li><a data-toggle="pill" href="#menu2">Fitness</a></li>
                          <li><a data-toggle="pill" href="#menu3"> Hobby</a></li>
                        </ul>
                        <!-- / tabs names -->
                        <!--tab container-->
                        <div class="tab-content">
                          <!-- tab-->
                          <div id="menu1" class="tab-pane fade in active">
                            <div class="sub-category">
                              <p>Academic</p>
                              <ul>
                                <li><a href="">English</a></li>
                                <li><a href="">German</a></li>
                                <li><a href="">French</a></li>
                              </ul>
                            </div>
                            <div class="sub-category">
                              <p>Academic</p>
                              <ul>
                                <li><a href="">English</a></li>
                                <li><a href="">German</a></li>
                                <li><a href="">French</a></li>
                              </ul>
                            </div>
                            <div class="sub-category">
                              <p>Academic</p>
                              <ul>
                                <li><a href="">English</a></li>
                                <li><a href="">German</a></li>
                                <li><a href="">French</a></li>
                              </ul>
                            </div>
                            <div class="sub-category">
                              <p>Academic</p>
                              <ul>
                                <li><a href="">English</a></li>
                                <li><a href="">German</a></li>
                                <li><a href="">French</a></li>
                              </ul>
                            </div>
                            <div class="sub-category">
                              <p>Test Preparation</p>
                              <ul>
                                <li><a href="">English</a></li>
                                <li><a href="">German</a></li>
                                <li><a href="">French</a></li>
                              </ul>
                            </div>
                          </div>
                          <!--/tab-->
                          <!-- tab-->
                          <div id="menu2" class="tab-pane fade">
                            <div class="sub-category">
                              <p>Academic</p>
                              <ul>
                                <li><a href="">English</a></li>
                                <li><a href="">German</a></li>
                                <li><a href="">French</a></li>
                              </ul>
                            </div>
                            <div class="sub-category">
                              <p>Academic</p>
                              <ul>
                                <li><a href="">English</a></li>
                                <li><a href="">German</a></li>
                                <li><a href="">French</a></li>
                              </ul>
                            </div>
                            <div class="sub-category">
                              <p>Test Preparation</p>
                              <ul>
                                <li><a href="">English</a></li>
                                <li><a href="">German</a></li>
                                <li><a href="">French</a></li>
                              </ul>
                            </div>
                          </div>
                          <!-- /tab-->
                          <!-- tab-->
                          <div id="menu3" class="tab-pane fade">
                            <div class="sub-category">
                              <p>Academic</p>
                              <ul>
                                <li><a href="">English</a></li>
                                <li><a href="">German</a></li>
                                <li><a href="">French</a></li>
                              </ul>
                            </div>
                            <div class="sub-category">
                              <p>Academic</p>
                              <ul>
                                <li><a href="">English</a></li>
                                <li><a href="">German</a></li>
                                <li><a href="">French</a></li>
                              </ul>
                            </div>
                          </div>
                          <!-- /tab-->
                        </div>
                        <!--tab container end-->
                      </form>
                      <!-- / drop down tab form-->
                    </div>
                  </div>
                </div>
              </div>
              <!-- / search by catergory -->
            </div>
            <!-- / search group -->
          </div>
          <!--search by city-->
          <div class="form-group col-md-2 search-by-city">
            <div class="dropdown dropdown-md">
              <!--search by city button-->
              <button type="button" class="btn btn-green font-white btn-big dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                <i class="fa fa-map-marker"></i>
              </button>
              <!-- / search by city button-->
              <!--search by city container-->
              <div class="dropdown-menu dropdown-menu-right search-by-city-container" role="menu">
                <form class="form-horizontal" role="form">
                  <div class="form-group">
                    <label>Enter Your City</label>
                    <input type="text" class="form-control" placeholder="Enter"/>
                  </div>
                </form>
                <div class="note">
                  <p>Mumbai, Pune, Bangalore, Delhi,Chennai, Kolkata, Hyderabad etc.</p>
                </div>
              </div>
              <!-- / search by city container-->
            </div>
          </div>
          <!-- / search by city-->
        </div>
      </div>
      <!--bottom marketing links-->
      <div class="marketing">
        <div class="row">
          <div class="col-lg-4">
            <p><a class="btn btn-default" href="#" role="button">Search Trainers</a></p>
          </div><!-- /.col-lg-4 -->
          <div class="col-lg-4">
            <p><a class="btn btn-default" href="#" role="button">Watch Videos</a></p>
          </div><!-- /.col-lg-4 -->
          <div class="col-lg-4">
            <p><a class="btn btn-default" href="#" role="button">Hire Them!</a></p>
          </div><!-- /.col-lg-4 -->
        </div><!-- /.row -->
      </div>
      <!-- / bottom marketing links-->
    </div>
  </div>
  <!-- / search box section-->
  <!--footer-->
  <footer class="footer">
    <div class="container">
      <p class="pull-right ">© 2016 Trainers Directory<a href="#" class="margin-left-15">info</a></p>
      <p>
        <a href="#" class="margin-right-15">About Us</a>
        <a href="#" class="margin-right-15">Sitemap</a>
        <a href="#" class="margin-right-15">Terms & Conditions</a>
        <a href="#" class="margin-right-15">Ads</a>
      </p>
    </div>
  </footer>
  <!--/footer-->
  <!-- script references -->
  <script src="public/js/jquery.min.js"></script>
  <script src="public/js/bootstrap.min.js"></script>
  <script src="public/js/scripts.js"></script>
</body>
</html>
