<?php
/**
 * Created by PhpStorm.
 * User: Ken
 * Date: 09/06/14
 * Time: 15:02
 */
include '../header/header.php';
$allplan = $planManager->findAll();
?>

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

<?php
include '../header/menu.php';
?>
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
            <li class="active">Add user</li>
        </ol>
    </section>
    <?php if(isset($_SESSION['addUserMessageError'])): ?>
    <div class="alert alert-danger alert-dismissable">
        <i class="fa fa-ban"></i>
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <?= $_SESSION['addUserMessageError'] ?>
        <?php unset($_SESSION['addUserMessageError']) ?>
    </div>
    <?php endif ?>
    <!-- Manage Plan -->
    <section id="managePlan" class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Add User </h3>
                    </div><!-- /.box-header -->
                    <div class="box-body table-responsive">
                        <form  class="form-horizontal" role="form" method="POST" action="../controller/addUser.php">
                            <div class="form-group">
                                <label for="firstname" class="col-sm-2 control-label">First name</label>
                                <div class="col-sm-2">
                                    <input name="firstname" type="text" class="form-control" id="firstname" placeholder="First name">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="lastname" class="col-sm-2 control-label">Last name</label>
                                <div class="col-sm-2">
                                    <input name="lastname" type="text" class="form-control" id="lastname" placeholder="Last name">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="password" class="col-sm-2 control-label">Password</label>
                                <div class="col-sm-2">
                                    <input name="password" type="text" class="form-control" id="password" placeholder="Password">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="email" class="col-sm-2 control-label">Email</label>
                                <div class="col-sm-2">
                                    <input name="email" type="text" class="form-control" id="email" placeholder="Email">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="geo" class="col-sm-2 control-label">Geolocation</label>
                                <div class="col-sm-2">
                                    <input name="geo" type="text" class="form-control" id="geo" placeholder="Geolocation">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Plan</label>
                                <div class="col-sm-2">
                                    <select name="plan" class="form-control">
                                        <?php foreach($allplan as $plan): ?>
                                            <option value="<?= $plan->getId() ?>" ><?= $plan->getName() ?></option>
                                        <?php endforeach ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">State</label>
                                <div class="col-sm-2">
                                    <select name="state" class="form-control">
                                        <option value="0" >Disabled</option>
                                        <option value="1" >Activated</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">isAdmin</label>
                                <div style="padding-top: 5px;" class="col-sm-2">
                                    <input type="checkbox" name="isAdmin" style="position: absolute; opacity: 0;">
                                </div>

                            </div>

                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                    <input  name="add_user" class="btn btn-success" type="submit" value="Add user">
                                </div>
                            </div>

                        </form>
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
    $(function(){


    });
</script>

</body>
</html>