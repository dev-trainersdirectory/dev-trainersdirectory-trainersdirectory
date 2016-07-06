<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin - Bootstrap Admin Template</title>

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

        <div id="page-wrapper" style="width:70%">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h3 class="page-header">
                            Admin Login
                        </h3>
                        <form action="login" method="post" role="form">
                            <?php if( '' != $errorMesssage ) { ?>
                                <div class="alert alert-danger alert-dismissable">
                                    <?=$errorMesssage?>
                                </div>
                            <?php } ?>
                        	<div class="row">
	                        	<div class="form-group col-lg-6">
	                                <label>Username</label>
	                                <input type="text" name="admin_username" class="form-control">
	                            </div>

	                            <div class="form-group col-lg-6">
	                                <label>Password</label>
	                                <input type="password" name="admin_password" class="form-control">
	                            </div>
	                        </div>
	                        <div class="row">
	                        	<div class="form-group col-lg-6">
									<input type='submit' value="Login" class="btn btn-primary">
	                        	</div>
	                        </div>
						</form>
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="public/admin/js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="public/admin/js/bootstrap.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="<?=base_url()?>public/admin/js/plugins/morris/raphael.min.js"></script>
    <script src="<?=base_url()?>public/admin/js/plugins/morris/morris.min.js"></script>
    <script src="<?=base_url()?>public/admin/js/plugins/morris/morris-data.js"></script>

</body>

</html>
