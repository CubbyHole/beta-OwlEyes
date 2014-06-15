<?php
/**
 * Created by PhpStorm.
 * User: Ken
 * Date: 09/06/14
 * Time: 15:02
 */
include '../header/header.php';

$usersManager = new UserPdoManager();
$accountManager = new AccountPdoManager();
$planManager = new RefPlanPdoManager();
$allUsers = $usersManager->findAll();

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
    <link href="../css/datatables/dataTables.tableTools.css" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="../css/AdminLTE.css" rel="stylesheet" type="text/css" />

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <embed src="/OwlEyes/swf/copy_csv_xls_pdf.swf">
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
    <?php elseif(isset($_SESSION['editUserMessage'])): ?>
        <div class="alert alert-success alert-dismissable">
            <i class="fa fa-check"></i>
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <?= $_SESSION['editUserMessage'] ?>
            <?php unset($_SESSION['editUserMessage']) ?>
        </div>
     <?php elseif(isset($_SESSION['editUserInvalidMessage'])): ?>
        <div class="alert alert-danger alert-dismissable">
            <i class="fa fa-ban"></i>
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <?= $_SESSION['editUserInvalidMessage'] ?>
            <?php unset($_SESSION['editUserInvalidMessage']) ?>
        </div>
        <?php elseif(isset($_SESSION['addUserMessage'])): ?>
        <div class="alert alert-success alert-dismissable">
            <i class="fa fa-check"></i>
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <?= $_SESSION['addUserMessage'] ?>
            <?php unset($_SESSION['addUserMessage']) ?>
        </div>
    <?php endif ?>

    <!-- Main content Plan -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">User<a style="margin-left: 20px;" class="btn-sm btn-success" href="/OwlEyes/pages/addUser.php"><i class="glyphicon glyphicon-plus"></i>&nbsp;Add user</a></h3>

                    </div><!-- /.box-header -->
                    <div class="box-header">


                    </div>
                    <div class="box-body table-responsive">
                        <table id="users" class="table table-bordered">
                            <thead>
                            <tr>
                                <th class="infoTitle">First name</th>
                                <th class="infoTitle">Last name</th>
                                <th class="infoTitle">Email</th>
                                <th class="infoTitle">Geolocation</th>
                                <th class="infoTitle">SD of CA<i data-toggle="tooltip" data-title="Start date of current account" class="fa fa-info-circle infoIcone"></i></th>
                                <th class="infoTitle">ED of CA<i data-toggle="tooltip" data-title="End date of current account" class="fa fa-info-circle infoIcone"></i></th>
                                <th class="infoTitle">Plan</th>
                                <th class="infoTitle">State</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach($allUsers as $user):

                                $account = $accountManager->findById($user->getCurrentAccount());
                                $user = $account->getUser();
                                $user = $usersManager->findById($user);
                                 ?>
                                <?php if($account->getState() == 0): ?>
                                    <tr  style="background: #d9534f;">
                                <?php elseif($user->getIsAdmin() == TRUE): ?>
                                    <tr  style="background: #b5d983;">
                                <?php endif ?>

                                <td class="infoName"><a class="infoUser" href="infoUser.php?id=<?= $account->getId() ?>"><?= $user->getFirstName() ?></a></td>
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
<script src="../js/plugins/datatables/dataTables.tableTools.js"></script>
<!-- AdminLTE App -->
<script src="../js/AdminLTE/app.js" type="text/javascript"></script>
<!-- AdminLTE for demo purposes -->
<script src="../js/AdminLTE/demo.js" type="text/javascript"></script>
<!-- page script -->
<script type="text/javascript">
    $(document).ready( function () {
        $('#users').dataTable( {
            "sDom": 'T<"clear">lfrtip',
            "oTableTools": {

                "aButtons": [
                    "copy",
                    {
                        "sExtends":    "collection",
                        "sButtonText": "Export",
                        "aButtons":    [
                            "csv",
                            "xls",
                            "pdf",
                            "print"

                        ]
                    }
                ]
            }
        } );
    } );
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
            if( confirm( 'Want to disabled this account ?' ) )
                return true;

            return false;
        });

//        $("#managePlan").css({'display':'none'});
        $("#managePlan").hide();

        $("[data-toggle='tooltip']").tooltip({
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