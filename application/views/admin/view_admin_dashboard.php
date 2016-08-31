<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>TD Admin</title>

    <!-- Bootstrap Core CSS -->
    <link href="<?=base_url()?>public/admin/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?=base_url()?>public/admin/css/sb-admin.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="<?=base_url()?>public/admin/css/plugins/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="<?=base_url()?>public/admin/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">
<!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">TD Admin</a>
            </div>
            <ul class="nav navbar-right top-nav">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> John Smith <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="#"><i class="fa fa-fw fa-user"></i> Profile</a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="logout"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                        </li>
                    </ul>
                </li>
            </ul>

            <!-- Top Menu Items -->
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li>
                        <a href="#" onclick="loadTab('admin_panel')"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
                    </li>
                    <li>
                        <a href="#" onclick="loadTab('<?=base_url()?>admin_trainers')"><i class="fa fa-fw fa-bar-chart-o"></i> Trainers</a>
                    </li>
                    <li>
                        <a href="#" onclick="loadTab('<?=base_url()?>admin_users')"><i class="fa fa-fw fa-table"></i> Users</a>
                    </li>
                    <li>
                        <a href="#" onclick="loadTab('<?=base_url()?>category_subjects')"><i class="fa fa-fw fa-table"></i> Category & Subject</a>
                    </li>
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#demo"><i class="fa fa-fw fa-arrows-v"></i> States/Cities <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="demo" class="collapse">
                            <li>
                                <a href="#" onclick="loadTab('<?=base_url()?>admin_states')">States</a>
                            </li>
                            <li>
                                <a href="#" onclick="loadTab('<?=base_url()?>admin_cities')">Cities</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#" onclick="loadTab('<?=base_url()?>sms_templates')"><i class="fa fa-fw fa-table"></i> SMS Templates</a>
                    </li>
                    <li>
                        <a href="#" onclick="loadTab('<?=base_url()?>email_templates')"><i class="fa fa-fw fa-table"></i> Email Templates</a>
                    </li>
                    <li>
                        <a href="#" onclick="loadTab('<?=base_url()?>admin_reviews')"><i class="fa fa-fw fa-table"></i> Reviews</a>
                    </li>
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#coin_mng"><i class="fa fa-fw fa-arrows-v"></i> Coin Management <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="coin_mng" class="collapse">
                            <li>
                                <a href="#" onclick="loadTab('<?=base_url()?>admin_coin_transactions')">Coin Transactions</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#dd_advertisements"><i class="fa fa-fw fa-arrows-v"></i> Advertisements <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="dd_advertisements" class="collapse">
                            <li>
                                <a href="#" onclick="loadTab('<?=base_url()?>admin_advertisers')">Advertiser</a>
                            </li>
                            <li>
                                <a href="#" onclick="loadTab('<?=base_url()?>admin_advertisements')">Advertisement</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#" onclick="loadTab('<?=base_url()?>admin_videos_images')"><i class="fa fa-fw fa-table"></i> Videos</a>
                    </li>
                    <li>
                        <a href="#" onclick="loadTab('<?=base_url()?>admin_transactions')"><i class="fa fa-fw fa-table"></i> Transaction Costs</a>
                    </li>
                     <li>
                        <a href="#" onclick="loadTab('<?=base_url()?>admin_bulk_upload')"><i class="fa fa-fw fa-table"></i> Bulk Upload </a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>
        
        <div id="page-wrapper">

            <div class="container-fluid">

                
            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="<?=base_url()?>public/admin/js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?=base_url()?>public/admin/js/bootstrap.min.js"></script>

    

    <script type="text/javascript" src="/public/js/jquery.min.js"></script>
    <script src="<?=base_url() ?>public/js/third_party/ckeditor/ckeditor.js"></script>
    <script type="text/javascript">

    function loadTab(url) {
    $('.container-fluid').html('<div align="center"><img align="center" src="<?=base_url()?>public/images/load.gif"></div>');
        $.ajax ({
            type: "post",
            url: url,
            success: function(result) {
                if(result) {
                    $('.container-fluid').html(result);
                }
            }
        });
     }
     loadTab('admin_panel');
    </script>
</body>

</html>
