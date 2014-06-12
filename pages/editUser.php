<?php
/**
 * Created by PhpStorm.
 * User: Ken
 * Date: 09/06/14
 * Time: 15:02
 */
include '../header/header.php';

if(isset($_GET['id']))
{
    $id = $_GET['id'];//récupère l'id passser en url
}

$accountManager = new AccountPdoManager();
$userManager = new UserPdoManager();
$planManager = new RefPlanPdoManager();

$account = $accountManager->findById($id);//id account
$accountUser = $account->getUser();//id user
$plan = $planManager->findById($account->getRefPlan());//id du plan

$startDateArray = $accountManager->formatMongoDate($account->getStartDate());
$endDateArray = $accountManager->formatMongoDate($account->getEndDate());

//récupère la collection user via id
$user = $userManager->findById($accountUser);
include '../header/menu.php';
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
            <li class="active">Edit user</li>
        </ol>
    </section>

    <!-- Manage Plan -->
    <section id="managePlan" class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Edit User </h3>
                    </div><!-- /.box-header -->
                    <div class="box-body table-responsive">
                        <form  class="form-horizontal" role="form" method="POST" action="../controller/editUser.php?id=<?= $account->getId() ?>">
                            <div class="form-group">
                                <label for="firstname" class="col-sm-2 control-label">First name</label>
                                <div class="col-sm-2">
                                    <input name="firstname" type="text" class="form-control" id="firstname" placeholder="First name" value="<?= $user->getFirstName() ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="lastname" class="col-sm-2 control-label">Last name</label>
                                <div class="col-sm-2">
                                    <input name="lastname" type="text" class="form-control" id="lastname" placeholder="Last name" value="<?= $user->getLastName() ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="email" class="col-sm-2 control-label">Email</label>
                                <div class="col-sm-2">
                                    <input name="email" type="text" class="form-control" id="email" placeholder="Email" value="<?= $user->getEmail() ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="geo" class="col-sm-2 control-label">Geolocation</label>
                                <div class="col-sm-2">
                                    <input name="geo" type="text" class="form-control" id="geo" placeholder="Geolocation" value="<?= $user->getGeolocation() ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="startDate" class="col-sm-2 control-label">Start date</label>
                                <div class="col-sm-2">
                                    <input name="startDate" type="text" class="form-control" id="startDate" placeholder="Start date" value="<?= $startDateArray['date'] ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="endDate" class="col-sm-2 control-label">End date</label>
                                <div class="col-sm-2">
                                    <input name="endDate" type="text" class="form-control" id="endDate" placeholder="End date" value="<?= $endDateArray['date'] ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="plan" class="col-sm-2 control-label">Plan</label>
                                <div class="col-sm-2">
                                    <input name="plan" type="text" class="form-control" id="plan" placeholder="Plan" value="<?= $plan->getName() ?>">
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                    <input  name="edit_user" class="btn btn-success" type="submit">
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