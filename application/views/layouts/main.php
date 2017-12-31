<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title><?php echo $_title; ?></title>
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <link rel="stylesheet" href="<?php echo base_url('assets/plugins') ?>/bootstrap/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="<?php echo base_url('assets/plugins') ?>/font-awesome/css/font-awesome.min.css">
        <link rel="stylesheet" href="<?php echo base_url('assets/plugins') ?>/Ionicons/css/ionicons.min.css">
        <link rel="stylesheet" href="<?php echo base_url('assets') ?>/css/AdminLTE.min.css">
        <link rel="stylesheet" href="<?php echo base_url('assets') ?>/css/skins/_all-skins.min.css">
        <link rel="stylesheet" href="<?php echo base_url('assets/plugins') ?>/datatables.net-bs/css/dataTables.bootstrap.min.css">
        <link rel="stylesheet" href="<?php echo base_url('assets') ?>/css/map.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
        <script src="<?php echo base_url('assets/plugins') ?>/jquery/dist/jquery.min.js"></script>
        <script>var base_url = '<?php echo base_url();?>'</script>
    </head>
    <body class="hold-transition skin-blue layout-top-nav">
        <div class="wrapper">
            <header class="main-header">
                <nav class="navbar navbar-static-top">
                    <div class="container">
                        <div class="navbar-header">
                            <a href="<?php echo base_url('') ?>" class="navbar-brand"><b>Idea</b></a>
                            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
                                <i class="fa fa-bars"></i>
                            </button>
                        </div>
                        <div class="collapse navbar-collapse pull-left" id="navbar-collapse">
                            <ul class="nav navbar-nav">
                                <li><a href="#">Dashboard <span class="sr-only">(current)</span></a></li>           
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> User <span class="caret"></span></a>
                                    <ul class="dropdown-menu" role="menu">
                                        <li><a href="<?php echo base_url('user/vendor') ?>">Vendor</a></li>
                                        <li><a href="#">Another action</a></li>
                                        <li><a href="#">Something else here</a></li>
                                        <li class="divider"></li>
                                        <li><a href="#">Separated link</a></li>
                                        <li class="divider"></li>
                                        <li><a href="#">One more separated link</a></li>
                                    </ul>
                                </li>
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-inbox"></i> Product <span class="caret"></span></a>
                                    <ul class="dropdown-menu" role="menu">
                                        <li><a href="<?php echo base_url('product/') ?>">Product Listing</a></li>
                                        <li><a href="<?php echo base_url('product/product_category') ?>">Product Category</a></li>
                                       
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="navbar-custom-menu">
                            <ul class="nav navbar-nav">
                                <li class="dropdown messages-menu">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                        <i class="fa fa-envelope-o"></i>
                                        <span class="label label-success">4</span>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li class="header">You have 4 messages</li>
                                        <li>
                                            <ul class="menu">
                                                <li><!-- start message -->
                                                    <a href="#">
                                                        <div class="pull-left">
                                                            <!-- User Image -->
                                                            <img src="<?php echo base_url('assets') ?>/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                                                        </div>
                                                        <!-- Message title and timestamp -->
                                                        <h4>
                                                            Support Team
                                                            <small><i class="fa fa-clock-o"></i> 5 mins</small>
                                                        </h4>
                                                        <!-- The message -->
                                                        <p>Why not buy a new awesome theme?</p>
                                                    </a>
                                                </li>
                                                <!-- end message -->
                                            </ul>
                                            <!-- /.menu -->
                                        </li>
                                        <li class="footer"><a href="#">See All Messages</a></li>
                                    </ul>
                                </li>
                                <!-- /.messages-menu -->

                                <!-- Notifications Menu -->
                                <li class="dropdown notifications-menu">
                                    <!-- Menu toggle button -->
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                        <i class="fa fa-bell-o"></i>
                                        <span class="label label-warning">10</span>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li class="header">You have 10 notifications</li>
                                        <li>
                                            <!-- Inner Menu: contains the notifications -->
                                            <ul class="menu">
                                                <li><!-- start notification -->
                                                    <a href="#">
                                                        <i class="fa fa-users text-aqua"></i> 5 new members joined today
                                                    </a>
                                                </li>
                                                <!-- end notification -->
                                            </ul>
                                        </li>
                                        <li class="footer"><a href="#">View all</a></li>
                                    </ul>
                                </li>
                                <!-- Tasks Menu -->
                                <li class="dropdown tasks-menu">
                                    <!-- Menu Toggle Button -->
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                        <i class="fa fa-flag-o"></i>
                                        <span class="label label-danger">9</span>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li class="header">You have 9 tasks</li>
                                        <li>
                                            <!-- Inner menu: contains the tasks -->
                                            <ul class="menu">
                                                <li><!-- Task item -->
                                                    <a href="#">
                                                        <!-- Task title and progress text -->
                                                        <h3>
                                                            Design some buttons
                                                            <small class="pull-right">20%</small>
                                                        </h3>
                                                        <!-- The progress bar -->
                                                        <div class="progress xs">
                                                            <!-- Change the css width attribute to simulate progress -->
                                                            <div class="progress-bar progress-bar-aqua" style="width: 20%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                                                                <span class="sr-only">20% Complete</span>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </li>
                                                <!-- end task item -->
                                            </ul>
                                        </li>
                                        <li class="footer">
                                            <a href="#">View all tasks</a>
                                        </li>
                                    </ul>
                                </li>
                                <!-- User Account Menu -->
                                <li class="dropdown user user-menu">
                                    <!-- Menu Toggle Button -->
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                        <!-- The user image in the navbar-->
                                        <img src="<?php echo base_url('assets') ?>/img/user2-160x160.jpg" class="user-image" alt="User Image">
                                        <!-- hidden-xs hides the username on small devices so only the image appears. -->
                                        <span class="hidden-xs">Alexander Pierce</span>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <!-- The user image in the menu -->
                                        <li class="user-header">
                                            <img src="<?php echo base_url('assets') ?>/img/user2-160x160.jpg" class="img-circle" alt="User Image">

                                            <p>
                                                Alexander Pierce - Web Developer
                                                <small>Member since Nov. 2012</small>
                                            </p>
                                        </li>
                                        <!-- Menu Body -->
                                        <li class="user-body">
                                            <div class="row">
                                                <div class="col-xs-4 text-center">
                                                    <a href="#">Followers</a>
                                                </div>
                                                <div class="col-xs-4 text-center">
                                                    <a href="#">Sales</a>
                                                </div>
                                                <div class="col-xs-4 text-center">
                                                    <a href="#">Friends</a>
                                                </div>
                                            </div>
                                            <!-- /.row -->
                                        </li>
                                        <!-- Menu Footer-->
                                        <li class="user-footer">
                                            <div class="pull-left">
                                                <a href="#" class="btn btn-default btn-flat">Profile</a>
                                            </div>
                                            <div class="pull-right">
                                                <a href="#" class="btn btn-default btn-flat">Sign out</a>
                                            </div>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <!-- /.navbar-custom-menu -->
                    </div>
                    <!-- /.container-fluid -->
                </nav>
            </header>
            <!-- Full Width Column -->
            <?php
                $this->load->view($_main);            
            ?>
            <!-- /.content-wrapper -->
            <footer class="main-footer">
                <div class="container">
                    <div class="pull-right hidden-xs">
                        <b>Version</b> 2.4.0
                    </div>
                    <strong>Copyright &copy; 2018 <a href="#">Idea</a>.</strong> All rights
                    reserved.
                </div>
                <!-- /.container -->
            </footer>
        </div>
        
        <script src="<?php echo base_url('assets/plugins') ?>/bootstrap/dist/js/bootstrap.min.js"></script>
        <script src="<?php echo base_url('assets/plugins') ?>/jquery-slimscroll/jquery.slimscroll.min.js"></script>
        <script src="<?php echo base_url('assets/plugins') ?>/fastclick/lib/fastclick.js"></script>
        <script src="<?php echo base_url('assets') ?>/js/adminlte.min.js"></script>
        <script src="<?php echo base_url('assets/plugins') ?>/datatables.net/js/jquery.dataTables.min.js"></script>
		<script src="<?php echo base_url('assets/plugins') ?>/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
        <script src="<?php echo base_url('assets') ?>/js/demo.js"></script>
        <script src="<?php echo base_url('assets') ?>/js/app.js"></script>
		<script src="//cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.3.26/jquery.form-validator.min.js"></script>
		<script>$.validate()</script>
    </body>
</html>
