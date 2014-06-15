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
$userManager = new UserPdoManager();
$planManager = new RefPlanPdoManager();
$accountManager = new AccountPdoManager();
$allplan = $planManager->findAll();

$account = $accountManager->findById($id);//id account
$accountUser = $account->getUser();//id user
$currentPlan = $planManager->findById($account->getRefPlan());//id du plan
$user = $userManager->findById($accountUser);//récupère la collection user via id
/*********************************/
$criteria2014 = array(
    'idUser' => $accountUser, //recupère uniquement ce compte
    'startDate' => array(
        '$gt' => new MongoDate(strtotime("2014-01-01 00:00:00")), //récupère un compte dont la date de début est plus grand que
        '$lte' => new MongoDate(strtotime("2014-12-30 23:59:59")) // et inférieur à
    )
);
$filterDate = $accountManager->find($criteria2014);

//foreach($filterDate as $thisAccount)
//{
//
//    var_dump($thisAccount->getStorage());
//    echo 'getUser';
//    var_dump($thisAccount->getUser());
//    var_dump($thisAccount->getRatio());
//}
//
//exit();




$total = 100;
//pourcentage ratio
$ratio =round(convertKilobytes($account->getRatio())); //ratio de l'user
$maxRatio = round(convertKilobytes($currentPlan->getMaxRatio()));//maxRatio user
$valueRatio = _percentage($ratio, $maxRatio, $total);//valeur convertie en %
switch($valueRatio)
{
    case $valueRatio >= 60:
        $classRatio = 'progress-bar-warning';


    case $valueRatio >= 80:
        $classRatio = 'progress-bar-danger';
        break;

    default:
        $classRatio = 'progress-bar-green';
        break;
}

//pourcentage storage
$storage =round(convertKilobytes($account->getStorage())); //ratio de l'user
$maxStorage = round(convertKilobytes($currentPlan->getMaxStorage()));//maxRatio user
$valueStorage = _percentage($storage, $maxStorage, $total);//valeur convertie en %
switch($valueStorage)
{
    case $valueStorage >= 60:
        $classStorage = 'progress-bar-warning';


    case $valueStorage >= 80 :
        $classStorage = 'progress-bar-danger';
        break;

    default:
        $classStorage = 'progress-bar-green';
        break;
}


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
            View info
            <small>info user</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Add user</li>
        </ol>
    </section>

    <!-- Manage Plan -->
    <section id="managePlan" class="content">
        <div style="margin-left: 0" class="alert alert-info alert-dismissable">
            <i class="fa fa-info"></i>
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <b>Information</b> about <?= $user->getFirstName() ?>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="box box-info">
                    <div class="box-header">
                        <h3 class="box-title"><?= $user->getFirstname().' '.$user->getLastname() ?></h3>
                    </div><!-- /.box-header -->
                    <div class="box-body">
                        <label class="col-sm-2 control-label" for="firstname">_id</label>
                        <p id="plan"><?= $account->getId() ?></p>

                        <label class="col-sm-2 control-label" for="firstname">State</label>
                        <p id="plan"><?= $user->getState() ?></p>

                        <label class="col-sm-2 control-label" for="firstname">isAdmin</label>
                        <?php if($user->getIsAdmin() == FALSE): ?>
                            <p id="plan">No</p>
                        <?php else: ?>
                            <p id="plan">Yes</p>
                        <?php endif ?>

                        <label class="col-sm-2 control-label" for="firstname">First name</label>
                        <p id="firstname"><?= $user->getFirstname() ?></p>

                        <label class="col-sm-2 control-label" for="firstname">Last name</label>
                        <p id="firstname"><?= $user->getLastname() ?></p>

                        <label class="col-sm-2 control-label" for="firstname">Email</label>
                        <p id="firstname"><?= $user->getEmail() ?></p>

                        <label class="col-sm-2 control-label" for="firstname">Geolocation</label>
                        <p id="firstname"><?= $user->getGeolocation() ?></p>

                        <label class="col-sm-2 control-label" for="firstname">Subscribe date</label>
                        <p id="firstname"><?= $userManager->formatMongoDate($account->getStartDate())['date'] ?></p>

                        <label class="col-sm-2 control-label" for="firstname">End date</label>
                        <p id="firstname"><?= $userManager->formatMongoDate($account->getEndDate())['date'] ?></p>

                        <label class="col-sm-2 control-label" for="firstname">Plan</label>
                        <p id="plan"><?= $currentPlan->getName() ?></p>

                        <label class="col-sm-2 control-label" for="firstname">Upload speed</label>
                        <p id="plan"><?= $currentPlan->getUploadSpeed() ?> Kb/s</p>

                        <label class="col-sm-2 control-label" for="firstname">Download speed</label>
                        <p id="plan"><?= $currentPlan->getDownloadSpeed() ?> Kb/s</p>

                        <label class="col-sm-2 control-label" for="firstname">Storage capacity</label>
                        <div class="progress">
                            <div id="progressStorage" data-toggle="tooltip" data-original-title="<?= $storage.' Mb/'.$maxStorage.' Mb' ?>" class="progress-bar <?= $classStorage ?>" role="progressbar" aria-valuenow="<?= $storage ?>"
                                 aria-valuemin="0" aria-valuemax="<?= $maxStorage ?>" style="width: <?= $valueStorage ?>%">
                                <span class="sr-only">40% Complete (success)</span>
                            </div>
                        </div>

                        <label class="col-sm-2 control-label" for="firstname">Data traded today</label>
                        <div class="progress">
                            <div id="progressRatio" data-toggle="tooltip" data-original-title="<?= $ratio.' Mb/'.$maxRatio.' Mb' ?>" class="progress-bar <?= $classRatio ?>" role="progressbar" aria-valuenow="<?= $ratio ?>"
                                 aria-valuemin="0" aria-valuemax="<?= $maxRatio ?>" style="width: <?= $valueRatio ?>%">
                                <span class="sr-only">40% Complete (success)</span>
                            </div>
                        </div>
                    </div><!-- /.box-body -->
                </div><!-- /.box -->
            </div>

            <div class="col-md-12">
                <!-- Custom Tabs -->
                <div class="nav-tabs-custom">
                    <ul class="nav nav-tabs">

                        <li ><a href="#tab_1" data-toggle="tab"><?= date('Y',$account->getStartDate()->sec)//récupère l'année uniquement ?></a></li>

                    </ul>
                    <div class="tab-content col-md-12">
                        <?php foreach($filterDate as $thisAccount):
                            $accountOld = $accountManager->findById($thisAccount->getId());
//                            var_dump($accountOld);
                            $planOld = $planManager->findById($thisAccount->getRefPlan());
//                            var_dump($planOld);

                            //pourcentage storage
                            $storageOld =round(convertKilobytes($accountOld->getStorage())); //stockage de l'user
                            $maxStorageOld = round(convertKilobytes($planOld->getMaxStorage()));//maxStorage user
                            $valueStorageOld = _percentage($storageOld, $maxStorageOld, $total);//valeur convertie en %
                            switch($valueStorageOld)
                            {
                                case $valueStorageOld >= 60:
                                    $classStorageOld = 'progress-bar-warning';


                                case $valueStorageOld >= 80 :
                                    $classStorageOld = 'progress-bar-danger';
                                    break;

                                default:
                                    $classStorageOld = 'progress-bar-green';
                                    break;
                            }
                            ?>
                        <label class="col-sm-2 control-label" for="firstname">_idAccount</label>
                        <p id="firstname"><?= $thisAccount->getId() ?></p>

                        <label class="col-sm-2 control-label" for="firstname">Plan</label>
                        <p id="firstname"><?= $planOld->getName() ?></p>

                        <label class="col-sm-2 control-label" for="firstname">Subscribe date</label>
                        <p id="startdate"><?= $userManager->formatMongoDate($accountOld->getStartDate())['date'] ?></p>

                        <label class="col-sm-2 control-label" for="firstname">End date</label>
                        <p id="endate"><?= $userManager->formatMongoDate($accountOld->getEndDate())['date'] ?></p>

                        <div class="tab-pane active" id="tab_1">
                            <label class="col-sm-2 control-label" for="firstname">Storage capacity</label>
                            <div class="progress">
                                <div id="progressStorage" data-toggle="tooltip" data-original-title="<?= $storageOld.' Mb/'.$maxStorageOld.' Mb' ?>"
                                     class="progress-bar <?= $classStorageOld ?>" role="progressbar" aria-valuenow="<?= $storageOld ?>"
                                     aria-valuemin="0" aria-valuemax="<?= $planOld->getMaxStorage() ?>" style="width: <?= $valueStorageOld ?>%">

                                </div>
                            </div>
                        </div><!-- /.tab-pane -->
                            <hr>
                        <?php endforeach ?>
                    </div><!-- /.tab-content -->
                </div><!-- nav-tabs-custom -->
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
        $("#progressRatio").tooltip({
            position: top
        })
        $("#progressStorage").tooltip({
            position: top
        })

    });
</script>

</body>
</html>