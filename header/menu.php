<?php
/**
 * Created by PhpStorm.
 * User: Ken
 * Date: 12/06/14
 * Time: 10:53
 */

?>
<body class="skin-blue">
<!-- header logo: style can be found in header.less -->
<header class="header">
    <a href="/OwlEyes/index.php" class="logo">
        <img style="width: 32px;position: relative;top: -2px;" src="/OwlEyes/img/icons/owlEyes_logo_perch.png">
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

                <!-- Notifications: style can be found in dropdown.less -->
<!--                <li class="dropdown notifications-menu">-->
<!--                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">-->
<!--                        <i class="fa fa-warning"></i>-->
<!--                        <span class="label label-warning">10</span>-->
<!--                    </a>-->
<!--                        <ul class="dropdown-menu">-->
<!--                            <li class="header">You have 10 notifications</li>-->
<!--                            <li>-->
<!--                                <!-- inner menu: contains the actual data -->
<!--                                <ul class="menu">-->
<!--                                    <li>-->
<!--                                        <a href="#">-->
<!--                                            <i class="ion ion-ios7-people info"></i> 5 new members joined today-->
<!--                                        </a>-->
<!--                                    </li>-->
<!--                                    <li>-->
<!--                                        <a href="#">-->
<!--                                            <i class="fa fa-warning danger"></i> Very long description here that may not fit into the page and may cause design problems-->
<!--                                        </a>-->
<!--                                    </li>-->
<!--                                    <li>-->
<!--                                        <a href="#">-->
<!--                                            <i class="fa fa-users warning"></i> 5 new members joined-->
<!--                                        </a>-->
<!--                                    </li>-->
<!--                    -->
<!--                                    <li>-->
<!--                                        <a href="#">-->
<!--                                            <i class="ion ion-ios7-cart success"></i> 25 sales made-->
<!--                                        </a>-->
<!--                                    </li>-->
<!--                                    <li>-->
<!--                                        <a href="#">-->
<!--                                            <i class="ion ion-ios7-person danger"></i> You changed your username-->
<!--                                        </a>-->
<!--                                    </li>-->
<!--                                </ul>-->
<!--                            </li>-->
<!--                            <li class="footer"><a href="#">View all</a></li>-->
<!--                        </ul>-->
<!--                </li>-->
                <!-- Tasks: style can be found in dropdown.less -->

                <!-- User Account: style can be found in dropdown.less -->
                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="glyphicon glyphicon-user"></i>
                        <span><?php if(isset($userSession)){echo $userSession->getFirstname().' '.$userSession->getLastName();} ?> <i class="caret"></i></span>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- User image -->
                        <li class="user-header bg-light-blue">
                            <?php if(isset($userSession)): ?>
                                <img src=<?= getGravatar($userSession->getEmail()) ?> class="img-circle" alt="User Image" />
                            <?php endif ?>
                            <p>
                                <?= $userSession->getFirstname().' '.$userSession->getLastName() ?> - Supinfo Web Developer
                                <small>Member since &nbsp;<?= $startDateArray['date'] ?></small>
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
                                <a id="logout" href="/OwlEyes/pages/logout.php" class="btn btn-default btn-flat">Sign out</a>
                            </div>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
</header>

<div id="contenuDash" class="wrapper row-offcanvas row-offcanvas-left">
    <!-- Left side column. contains the logo and sidebar -->
    <aside class="left-side sidebar-offcanvas">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
            <!-- Sidebar user panel -->
            <div class="user-panel">
                <div class="pull-left image">
                    <?php if($userSession): ?>
                        <img src=<?= getGravatar($userSession->getEmail()); ?> class="img-circle" alt="User Image" />
                    <?php endif ?>
                </div>
                <div class="pull-left info">
                    <p>Hello, <?= $userSession->getFirstname() ?></p>

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
                <li class="active">
                    <a href="/OwlEyes/index.php">
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
                        <li><a href="/OwlEyes/pages/plan.php"><i class="fa fa-angle-double-right"></i> List plan</a></li>
                        <li><a href="/OwlEyes/pages/addPlan.php"><i class="fa fa-angle-double-right"></i> Add plan</a></li>
                    </ul>
                </li>
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-users"></i>
                        <span>Users</span>
                        <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="/OwlEyes/pages/users.php"><i class="fa fa-angle-double-right"></i> List users</a></li>
                        <li><a href="/OwlEyes/pages/addUser.php"><i class="fa fa-angle-double-right"></i> Add user</a></li>
                    </ul>
                </li>
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-windows"></i>
                        <span>Websites</span>
                        <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="/Cubbyhole/" target="_blank"><i class="fa fa-angle-double-right"></i> Cubbyhole</a></li>
                        <li><a href="/Nestbox/" target="_blank"><i class="fa fa-angle-double-right"></i> Nestbox</a></li>
                        <li><a href="/rockmongo-on-windows/web/rockmongo/index.php/" target="_blank"><i class="fa fa-angle-double-right"></i> Rockmongo</a></li>
                        <li><a href="http://10.12.240.73:7767/problems" target="_blank"><i class="fa fa-angle-double-right"></i> Shinken</a></li>
                        <li><a href="http://localhost:27017" target="_blank"><i class="fa fa-angle-double-right"></i> MongoDB Admin</a></li>
                    </ul>
                </li>
                <hr>
                <li>
                    <a href="/OwlEyes/pages/widgets.php">
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
                        <li><a href="/OwlEyes/pages/charts/morris.php"><i class="fa fa-angle-double-right"></i> Morris</a></li>
                        <li><a href="/OwlEyes/pages/charts/flot.php"><i class="fa fa-angle-double-right"></i> Flot</a></li>
                        <li><a href="/OwlEyes/pages/charts/inline.php"><i class="fa fa-angle-double-right"></i> Inline charts</a></li>
                    </ul>
                </li>
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-laptop"></i>
                        <span>UI Elements</span>
                        <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="/OwlEyes/pages/UI/general.php"><i class="fa fa-angle-double-right"></i> General</a></li>
                        <li><a href="/OwlEyes/pages/UI/icons.php"><i class="fa fa-angle-double-right"></i> Icons</a></li>
                        <li><a href="/OwlEyes/pages/UI/buttons.php"><i class="fa fa-angle-double-right"></i> Buttons</a></li>
                        <li><a href="/OwlEyes/pages/UI/sliders.php"><i class="fa fa-angle-double-right"></i> Sliders</a></li>
                        <li><a href="/OwlEyes/pages/UI/timeline.php"><i class="fa fa-angle-double-right"></i> Timeline</a></li>
                    </ul>
                </li>
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-edit"></i> <span>Forms</span>
                        <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="/OwlEyes/pages/forms/general.php"><i class="fa fa-angle-double-right"></i> General Elements</a></li>
                        <li><a href="/OwlEyes/pages/forms/advanced.php"><i class="fa fa-angle-double-right"></i> Advanced Elements</a></li>
                        <li><a href="/OwlEyes/pages/forms/editors.php"><i class="fa fa-angle-double-right"></i> Editors</a></li>
                    </ul>
                </li>
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-table"></i> <span>Tables</span>
                        <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="/OwlEyes/pages/tables/simple.php"><i class="fa fa-angle-double-right"></i> Simple tables</a></li>
                        <li><a href="/OwlEyes/pages/tables/data.php"><i class="fa fa-angle-double-right"></i> Data tables</a></li>
                    </ul>
                </li>
                <li>
                    <a href="pages/calendar.php">
                        <i class="fa fa-calendar"></i> <span>Calendar</span>
                        <small class="badge pull-right bg-red">3</small>
                    </a>
                </li>
                <li>
                    <a href="pages/mailbox.php">
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
                        <li><a href="/OwlEyes/pages/examples/invoice.php"><i class="fa fa-angle-double-right"></i> Invoice</a></li>
                        <li><a href="/OwlEyes/pages/login.php"><i class="fa fa-angle-double-right"></i> Login</a></li>
                        <li><a href="/OwlEyes/pages/examples/register.php"><i class="fa fa-angle-double-right"></i> Register</a></li>
                        <li><a href="/OwlEyes/pages/examples/lockscreen.php"><i class="fa fa-angle-double-right"></i> Lockscreen</a></li>
                        <li><a href="/OwlEyes/pages/404.php"><i class="fa fa-angle-double-right"></i> 404 Error</a></li>
                        <li><a href="/OwlEyes/pages/500.php"><i class="fa fa-angle-double-right"></i> 500 Error</a></li>
                        <li><a href="/OwlEyes/pages/examples/blank.php"><i class="fa fa-angle-double-right"></i> Blank Page</a></li>
                    </ul>
                </li>

            </ul>
        </section>
        <!-- /.sidebar -->
    </aside>