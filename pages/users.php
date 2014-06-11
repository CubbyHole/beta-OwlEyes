<?php
/**
 * Created by PhpStorm.
 * User: Ken
 * Date: 09/06/14
 * Time: 15:02
 */
session_start();
$projectRoot = $_SERVER['DOCUMENT_ROOT'].'/OwlEyes';
require_once $projectRoot.'/required.php';

$usersManager = new UserPdoManager();
$accountManager = new AccountPdoManager();
$planManager = new RefPlanPdoManager();
$allUsers = $usersManager->findAll();

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Owl Eyes | Plan</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- bootstrap 3.0.2 -->
    <link href="../css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- font Awesome -->
    <link href="../css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Ionicons -->
    <link href="../css/ionicons.min.css" rel="stylesheet" type="text/css" />
    <!-- DATA TABLES -->
    <link href="../css/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="../css/AdminLTE.css" rel="stylesheet" type="text/css" />

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
</head>

<body class="skin-blue">
<!-- header logo: style can be found in header.less -->
<header class="header">
<a href="/OwlEyes/index.php" class="logo">
    <!-- Add the class icon to your logo image or logo icon to add the margining -->
    Owl Eyes
</a>
<!-- Header Navbar: style can be found in header.less -->
<nav class="navbar navbar-static-top" role="navigation">
<!-- Sidebar toggle button-->
<a href="#" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button">
    <span class="sr-only">Toggle navigation</span>
    <span class="icon-bar"></span>
    <span class="icon-bar"></span>
    <span class="icon-bar"></span>
</a>
<div class="navbar-right">
<ul class="nav navbar-nav">
<!-- Messages: style can be found in dropdown.less-->
<li class="dropdown messages-menu">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
        <i class="fa fa-envelope"></i>
        <span class="label label-success">4</span>
    </a>
    <ul class="dropdown-menu">
        <li class="header">You have 4 messages</li>
        <li>
            <!-- inner menu: contains the actual data -->
            <ul class="menu">
                <li><!-- start message -->
                    <a href="#">
                        <div class="pull-left">
                            <img src="../img/avatar3.png" class="img-circle" alt="User Image"/>
                        </div>
                        <h4>
                            Support Team
                            <small><i class="fa fa-clock-o"></i> 5 mins</small>
                        </h4>
                        <p>Why not buy a new awesome theme?</p>
                    </a>
                </li><!-- end message -->
                <li>
                    <a href="#">
                        <div class="pull-left">
                            <img src="../img/avatar2.png" class="img-circle" alt="user image"/>
                        </div>
                        <h4>
                            AdminLTE Design Team
                            <small><i class="fa fa-clock-o"></i> 2 hours</small>
                        </h4>
                        <p>Why not buy a new awesome theme?</p>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <div class="pull-left">
                            <img src="../img/avatar.png" class="img-circle" alt="user image"/>
                        </div>
                        <h4>
                            Developers
                            <small><i class="fa fa-clock-o"></i> Today</small>
                        </h4>
                        <p>Why not buy a new awesome theme?</p>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <div class="pull-left">
                            <img src="../img/avatar2.png" class="img-circle" alt="user image"/>
                        </div>
                        <h4>
                            Sales Department
                            <small><i class="fa fa-clock-o"></i> Yesterday</small>
                        </h4>
                        <p>Why not buy a new awesome theme?</p>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <div class="pull-left">
                            <img src="../img/avatar.png" class="img-circle" alt="user image"/>
                        </div>
                        <h4>
                            Reviewers
                            <small><i class="fa fa-clock-o"></i> 2 days</small>
                        </h4>
                        <p>Why not buy a new awesome theme?</p>
                    </a>
                </li>
            </ul>
        </li>
        <li class="footer"><a href="#">See All Messages</a></li>
    </ul>
</li>
<!-- Notifications: style can be found in dropdown.less -->
<li class="dropdown notifications-menu">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
        <i class="fa fa-warning"></i>
        <span class="label label-warning">10</span>
    </a>
    <ul class="dropdown-menu">
        <li class="header">You have 10 notifications</li>
        <li>
            <!-- inner menu: contains the actual data -->
            <ul class="menu">
                <li>
                    <a href="#">
                        <i class="ion ion-ios7-people info"></i> 5 new members joined today
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="fa fa-warning danger"></i> Very long description here that may not fit into the page and may cause design problems
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="fa fa-users warning"></i> 5 new members joined
                    </a>
                </li>

                <li>
                    <a href="#">
                        <i class="ion ion-ios7-cart success"></i> 25 sales made
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="ion ion-ios7-person danger"></i> You changed your username
                    </a>
                </li>
            </ul>
        </li>
        <li class="footer"><a href="#">View all</a></li>
    </ul>
</li>
<!-- Tasks: style can be found in dropdown.less -->
<li class="dropdown tasks-menu">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
        <i class="fa fa-tasks"></i>
        <span class="label label-danger">9</span>
    </a>
    <ul class="dropdown-menu">
        <li class="header">You have 9 tasks</li>
        <li>
            <!-- inner menu: contains the actual data -->
            <ul class="menu">
                <li><!-- Task item -->
                    <a href="#">
                        <h3>
                            Design some buttons
                            <small class="pull-right">20%</small>
                        </h3>
                        <div class="progress xs">
                            <div class="progress-bar progress-bar-aqua" style="width: 20%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                                <span class="sr-only">20% Complete</span>
                            </div>
                        </div>
                    </a>
                </li><!-- end task item -->
                <li><!-- Task item -->
                    <a href="#">
                        <h3>
                            Create a nice theme
                            <small class="pull-right">40%</small>
                        </h3>
                        <div class="progress xs">
                            <div class="progress-bar progress-bar-green" style="width: 40%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                                <span class="sr-only">40% Complete</span>
                            </div>
                        </div>
                    </a>
                </li><!-- end task item -->
                <li><!-- Task item -->
                    <a href="#">
                        <h3>
                            Some task I need to do
                            <small class="pull-right">60%</small>
                        </h3>
                        <div class="progress xs">
                            <div class="progress-bar progress-bar-red" style="width: 60%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                                <span class="sr-only">60% Complete</span>
                            </div>
                        </div>
                    </a>
                </li><!-- end task item -->
                <li><!-- Task item -->
                    <a href="#">
                        <h3>
                            Make beautiful transitions
                            <small class="pull-right">80%</small>
                        </h3>
                        <div class="progress xs">
                            <div class="progress-bar progress-bar-yellow" style="width: 80%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                                <span class="sr-only">80% Complete</span>
                            </div>
                        </div>
                    </a>
                </li><!-- end task item -->
            </ul>
        </li>
        <li class="footer">
            <a href="#">View all tasks</a>
        </li>
    </ul>
</li>
<!-- User Account: style can be found in dropdown.less -->
<li class="dropdown user user-menu">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
        <i class="glyphicon glyphicon-user"></i>
        <span>Jane Doe <i class="caret"></i></span>
    </a>
    <ul class="dropdown-menu">
        <!-- User image -->
        <li class="user-header bg-light-blue">
            <img src="../img/avatar3.png" class="img-circle" alt="User Image" />
            <p>
                Jane Doe - Web Developer
                <small>Member since Nov. 2012</small>
            </p>
        </li>
        <!-- Menu Body -->
        <li class="user-body">
            <div class="col-xs-4 text-center">
                <a href="#">Followers</a>
            </div>
            <div class="col-xs-4 text-center">
                <a href="#">Sales</a>
            </div>
            <div class="col-xs-4 text-center">
                <a href="#">Friends</a>
            </div>
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
</nav>
</header>

<div class="wrapper row-offcanvas row-offcanvas-left">
<!-- Left side column. contains the logo and sidebar -->
<aside class="left-side sidebar-offcanvas">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="../img/avatar3.png" class="img-circle" alt="User Image" />
            </div>
            <div class="pull-left info">
                <p>Hello, Jane</p>

                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search..."/>
                            <span class="input-group-btn">
                                <button type='submit' name='seach' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
                            </span>
            </div>
        </form>
        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
            <li>
                <a href="../index.php">
                    <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                </a>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-bar-chart-o"></i>
                    <span>Plans</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="plan.php"><i class="fa fa-angle-double-right"></i> List plan</a></li>
                    <li><a href="addPlan.php"><i class="fa fa-angle-double-right"></i> Add plan</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-users"></i>
                    <span>Users</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="users.php"><i class="fa fa-angle-double-right"></i> List users</a></li>
                    <li><a href="addUser.php"><i class="fa fa-angle-double-right"></i> Add user</a></li>
                </ul>
            </li>
            <hr>
            <li>
                <a href="../widgets.php">
                    <i class="fa fa-th"></i> <span>Widgets</span> <small class="badge pull-right bg-green">new</small>
                </a>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-bar-chart-o"></i>
                    <span>Charts</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="../charts/morris.php"><i class="fa fa-angle-double-right"></i> Morris</a></li>
                    <li><a href="../charts/flot.php"><i class="fa fa-angle-double-right"></i> Flot</a></li>
                    <li><a href="../charts/inline.php"><i class="fa fa-angle-double-right"></i> Inline charts</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-laptop"></i>
                    <span>UI Elements</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="../UI/general.php"><i class="fa fa-angle-double-right"></i> General</a></li>
                    <li><a href="../UI/icons.php"><i class="fa fa-angle-double-right"></i> Icons</a></li>
                    <li><a href="../UI/buttons.php"><i class="fa fa-angle-double-right"></i> Buttons</a></li>
                    <li><a href="../UI/sliders.php"><i class="fa fa-angle-double-right"></i> Sliders</a></li>
                    <li><a href="../UI/timeline.php"><i class="fa fa-angle-double-right"></i> Timeline</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-edit"></i> <span>Forms</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="../forms/general.php"><i class="fa fa-angle-double-right"></i> General Elements</a></li>
                    <li><a href="../forms/advanced.php"><i class="fa fa-angle-double-right"></i> Advanced Elements</a></li>
                    <li><a href="../forms/editors.php"><i class="fa fa-angle-double-right"></i> Editors</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-table"></i> <span>Tables</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="simple.php"><i class="fa fa-angle-double-right"></i> Simple tables</a></li>
                    <li class="active"><a href="data.php"><i class="fa fa-angle-double-right"></i> Data tables</a></li>
                </ul>
            </li>
            <li>
                <a href="../calendar.php">
                    <i class="fa fa-calendar"></i> <span>Calendar</span>
                    <small class="badge pull-right bg-red">3</small>
                </a>
            </li>
            <li>
                <a href="../mailbox.php">
                    <i class="fa fa-envelope"></i> <span>Mailbox</span>
                    <small class="badge pull-right bg-yellow">12</small>
                </a>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-folder"></i> <span>Examples</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="../pages/examples/invoice.php"><i class="fa fa-angle-double-right"></i> Invoice</a></li>
                    <li><a href="../pages/examples/login.php"><i class="fa fa-angle-double-right"></i> Login</a></li>
                    <li><a href="../pages/examples/register.php"><i class="fa fa-angle-double-right"></i> Register</a></li>
                    <li><a href="../pages/examples/lockscreen.php"><i class="fa fa-angle-double-right"></i> Lockscreen</a></li>
                    <li><a href="../pages/examples/404.php"><i class="fa fa-angle-double-right"></i> 404 Error</a></li>
                    <li><a href="../pages/examples/500.php"><i class="fa fa-angle-double-right"></i> 500 Error</a></li>
                    <li><a href="../pages/examples/blank.php"><i class="fa fa-angle-double-right"></i> Blank Page</a></li>
                </ul>
            </li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>

<!-- Right side column. Contains the navbar and content of the page -->
<aside class="right-side">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Manage user
            <small>add/view/edit user</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Users</li>
        </ol>
    </section>
    <?php if(isset($_SESSION['addPlanMessage'])): ?>
        <div class="alert alert-success alert-dismissable">
            <i class="fa fa-check"></i>
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <?= $_SESSION['addPlanMessage'] ?>
            <?php unset($_SESSION['addPlanMessage']) ?>
        </div>
    <?php elseif(isset($_SESSION['editPlanMessage'])): ?>
        <div class="alert alert-success alert-dismissable">
            <i class="fa fa-check"></i>
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <?= $_SESSION['editPlanMessage'] ?>
            <?php unset($_SESSION['editPlanMessage']) ?>
        </div>
    <?php endif ?>

    <!-- Main content Plan -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">User<a style="margin-left: 20px;" class="btn-sm btn-success" href="/OwlEyes/pages/addPlan.php"><i class="glyphicon glyphicon-plus"></i>&nbsp;Add user</a></h3>

                    </div><!-- /.box-header -->
                    <div class="box-header">


                    </div>
                    <div class="box-body table-responsive">
                        <table id="plan" class="table table-bordered">
                            <thead>
                            <tr>
                                <th class="infoTitle">First name</th>
                                <th class="infoTitle">Last name</th>
                                <th class="infoTitle">Email</th>
                                <th class="infoTitle">Geolocation</th>
                                <th class="infoTitle">SD of CA<i data-title="Start date of current account" class="fa fa-info-circle infoIcone"></i></th>
                                <th class="infoTitle">ED of CA<i data-title="End date of current account" class="fa fa-info-circle infoIcone"></i></th>
                                <th class="infoTitle">Plan</th>
                                <th class="infoTitle">State</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach($allUsers as $user):
                                $account = $accountManager->findById($user->getCurrentAccount()); ?>
                                <?php if($account->getState() == 0): ?>
                                    <tr style="background: #d9534f;;">
                                <?php endif ?>
                                <td class="infoName"><?= $user->getFirstName() ?></td>
                                <td class="infoPrice"><?= $user->getLastName() ?></td>
                                <td class="infoStorage"><?= $user->getEmail() ?></td>
                                <td class="infoDL"><?= $user->getGeolocation() ?></td>
                                <?php

                                if($account instanceof Account)
                                {
                                    $startDateArray = $accountManager->formatMongoDate($account->getStartDate());
                                    $endDateArray = $accountManager->formatMongoDate($account->getEndDate());
                                    $plan = $planManager->findById($account->getRefPlan());
                                }

                                ?>
                                <td class="info"><?= $startDateArray['date']; ?></td>
                                <td class="info"><?= $endDateArray['date']; ?></td>
                                <td class="info"><?= $plan->getName() ?></td>
                                <td class="info"><?= $account->getState() ?></td>
                                <td>
                                    <a name="editPlan" type="submit" href="/OwlEyes/pages/editUser.php?id=<?= $account->getId() ?>" class="editUser btn btn-warning btn-xs">
                                        <span class="glyphicon glyphicon-cog"></span>
                                    </a>
                                    <?php if($user->getState() == 1): ?>
                                        <a  href="/OwlEyes/controller/disableUser.php?id=<?= $account->getId() ?>" type="button" class="disableUser btn btn-danger btn-xs">
                                            <span class="glyphicon glyphicon-trash"></span>
                                        </a>
                                    <?php endif ?>
                                </td>
                                </tr>
                            <?php endforeach ?>
                            </tbody>
                            <tfoot>
                            <tr>
                                <th class="infoTitle">Firstname</th>
                                <th class="infoTitle">Lastname</th>
                                <th class="infoTitle">Email</th>
                                <th class="infoTitle">Geolocation</th>
                                <th class="infoTitle">Registration date</th>
                                <th class="infoTitle">End date</th>
                                <th class="infoTitle">Plans</th>
                                <th class="infoTitle">State</th>
                                <th>Action</th>
                            </tr>
                            </tfoot>
                        </table>
                    </div><!-- /.box-body -->
                </div><!-- /.box -->
            </div>
        </div>
    </section><!-- /.content -->

</aside><!-- /.right-side -->
</div><!-- ./wrapper -->

<!-- jQuery 2.0.2 -->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="../js/bootstrap.min.js" type="text/javascript"></script>
<!-- DATA TABES SCRIPT -->
<script src="../js/plugins/datatables/jquery.dataTables.js" type="text/javascript"></script>
<script src="../js/plugins/datatables/dataTables.bootstrap.js" type="text/javascript"></script>
<!-- AdminLTE App -->
<script src="../js/AdminLTE/app.js" type="text/javascript"></script>
<!-- AdminLTE for demo purposes -->
<script src="../js/AdminLTE/demo.js" type="text/javascript"></script>
<!-- page script -->
<script type="text/javascript">
    $(function() {
        $("#example1").dataTable({
        });
        $('#plan').dataTable({
//            "bPaginate": true,
//            "bLengthChange": false,
//            "bFilter": false,
//            "bSort": true,
//            "bInfo": true,
//            "bAutoWidth": false
        });

        // Alerte de suppression d'un job
        $( '.disableUser' ).on( 'click', function( e )
        {
            if( confirm( 'Voulez vous supprimer cette offre ?' ) )
                return true;

            return false;
        });

//        $("#managePlan").css({'display':'none'});
        $("#managePlan").hide();

        $(".infoIcone").tooltip({
            position: top
        })


        // Scroll to add comment form
        $( '.editPlan' ).on( 'click', function()
        {
            $("#managePlan").fadeIn();

            var top = $( '#managePlan' ).offset().top - 50;


            // Use of scroll down page to comment form
            $("html, body").animate({ scrollTop: top }, 700, function() {
                $( '#name' ).focus();
            });

        });

    });
</script>

</body>
</html>