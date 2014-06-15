<?php
/**
 * Created by PhpStorm.
 * User: Ken
 * Date: 09/06/14
 * Time: 15:02
 */
include '../header/header.php';

$planManager = new RefPlanPdoManager();
$allPlan = $planManager->findAll();

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
<!--    <link href="../css/datatables/jquery.dataTables.css" rel="stylesheet" type="text/css" />-->

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
            Manage plan
            <small>add/view/edit plan</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Plan</li>
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
                        <h3 class="box-title">Plan<a style="margin-left: 20px;" class="btn-sm btn-success" href="/OwlEyes/pages/addPlan.php"><i class="glyphicon glyphicon-plus"></i>&nbsp;Add plan</a></h3>

                    </div><!-- /.box-header -->
                    <div class="box-header">


                    </div>
                    <div class="box-body table-responsive">
                        <table id="plan" class="table table-bordered">
                            <thead>
                            <tr>
                                <th class="infoTitle">Name</th>
                                <th class="infoTitle">Price($)</th>
                                <th class="infoTitle">Max storage(Mb)</th>
                                <th class="infoTitle">Download speed(Kb)</th>
                                <th class="infoTitle">Upload speed(Kb)</th>
                                <th class="infoTitle">Max ratio</th>
                                <th class="infoTitle">State</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach($allPlan as $plan): ?>
                                <?php if($plan->getState() == 0): ?>
                                <tr style="background: #d9534f;;">
                                <?php endif ?>
                                    <td class="infoName"><?= $plan->getName() ?></td>
                                    <td class="infoPrice"><?= $plan->getPrice() ?></td>
                                    <td class="infoStorage"><?= convertKilobytes($plan->getMaxStorage()) ?></td>
                                    <td class="infoDL"><?= $plan->getDownloadSpeed() ?></td>
                                    <td class="info"><?= $plan->getUploadSpeed() ?></td>
                                    <td class="info"><?= $plan->getMaxRatio() ?></td>
                                    <td class="info"><?= $plan->getState() ?></td>
                                    <td>
                                        <a name="editPlan" type="submit" href="/OwlEyes/pages/editPlan.php?id=<?= $plan->getId() ?>" class="editPlan btn btn-warning btn-xs">
                                            <span class="glyphicon glyphicon-cog"></span>
                                        </a>
                                        <?php if($plan->getState() == 1): ?>
                                        <a  href="/OwlEyes/controller/disablePlan.php?id=<?= $plan->getId() ?>" type="button" class="disablePlan btn btn-danger btn-xs">
                                            <span class="glyphicon glyphicon-trash"></span>
                                        </a>
                                       <?php endif ?>

                                    </td>
                                </tr>

                            <?php endforeach ?>
                            </tbody>
                            <tfoot>
                            <tr>
                                <th>Name</th>
                                <th>Price</th>
                                <th>Max storage</th>
                                <th>Download speed</th>
                                <th>Upload speed</th>
                                <th>Max ratio</th>
                                <th>State</th>
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
<script src="../js/bootstrap.min.js"></script>
<!-- DATA TABES SCRIPT -->
<script src="../js/plugins/datatables/jquery.dataTables.js"></script>
<script src="../js/plugins/datatables/dataTables.bootstrap.js" ></script>
<script src="../js/plugins/datatables/dataTables.tableTools.js"></script>
<!-- AdminLTE App -->
<script src="../js/AdminLTE/app.js" type="text/javascript"></script>
<!-- AdminLTE for demo purposes -->
<script src="../js/AdminLTE/demo.js" type="text/javascript"></script>
<!-- page script -->
<script type="text/javascript">
    $(document).ready( function () {
        $('#plan').dataTable( {
            "sDom": 'T<"clear">lfrtip',
            "oTableTools": {

                "aButtons": [
                    "copy",
                    {
                        "sExtends":    "collection",
                        "sButtonText": "Export",
                        "aButtons":    [ "csv", "xls", "pdf", "print" ]
                    }
                ]
            }
        } );
    } );

    $(function() {


        // Alerte de suppression d'un plan
        $( '.disablePlan' ).on( 'click', function( e )
        {
            if( confirm( 'You want to disabled this plan ?' ) )
                return true;

            return false;
        });

//        $("#managePlan").css({'display':'none'});
        $("#managePlan").hide();


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