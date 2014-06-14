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
    $id = $_GET['id'];
}

$planManager = new RefPlanPdoManager();

$plan = $planManager->findById($id);
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
            Manage plan
            <small>add/view/edit plan</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Plan</li>
        </ol>
    </section>

    <!-- Manage Plan -->
    <section id="managePlan" class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Edit Plan</h3>
                    </div><!-- /.box-header -->
                    <div class="box-body table-responsive">
                        <form  class="form-horizontal" role="form" method="POST" action="../controller/editPlan.php?id=<?= $plan->getId() ?>">
                            <div class="form-group">
                                <label for="name" class="col-sm-2 control-label">Name</label>
                                <div class="col-sm-2">
                                    <input name="name" type="text" class="form-control" id="name" placeholder="Name" value="<?= $plan->getName() ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="price" class="col-sm-2 control-label">Price</label>
                                <div class="col-sm-2">
                                    <input name="price" type="number" class="form-control" id="price" placeholder="Price" value="<?= $plan->getPrice() ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="maxStorage" class="col-sm-2 control-label">Max storage(Mb)</label>
                                <div class="col-sm-2">
                                    <input name="maxStorage" type="number" class="form-control" id="maxStorage" placeholder="Maximum storage" value="<?= $plan->getMaxStorage() ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="downL" class="col-sm-2 control-label">Download speed(Kb)</label>
                                <div class="col-sm-2">
                                    <input name="downL" type="number" class="form-control" id="downL" placeholder="Download speed" value="<?= $plan->getDownloadSpeed() ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="upL" class="col-sm-2 control-label">Upload speed(Kb)</label>
                                <div class="col-sm-2">
                                    <input name="upL" type="number" class="form-control" id="upL" placeholder="Upload speed" value="<?= $plan->getUploadSpeed() ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="maxRatio" class="col-sm-2 control-label">Max ratio</label>
                                <div class="col-sm-2">
                                    <input name="maxRatio" type="number" class="form-control" id="maxRatio" placeholder="Maximum ratio" value="<?= $plan->getMaxRatio() ?>">
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                    <input  name="edit_plan" class="btn btn-success" type="submit">
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
        $( '.disablePlan' ).on( 'click', function( e )
        {
            if( confirm( 'Voulez vous supprimer cette offre ?' ) )
                return true;

            return false;
        });

    });

    });
</script>

</body>
</html>