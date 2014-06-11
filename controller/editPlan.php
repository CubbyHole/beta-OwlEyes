<?php
/**
 * Created by PhpStorm.
 * User: Ken
 * Date: 10/06/14
 * Time: 21:33
 */
session_start();
$projectRoot = $_SERVER['DOCUMENT_ROOT'].'/OwlEyes';
require_once $projectRoot.'/required.php';
$id = $_GET['id'];

//Traitement pour l'ajout du plan en bdd
if(isset($_POST['edit_plan']))
{
    $name = $_POST['name'];
    $price = $_POST['price'];
    $maxStorage = $_POST['maxStorage'];
    $dl = $_POST['downL'];
    $up = $_POST['upL'];
    $maxRatio = $_POST['maxRatio'];

    if(!empty($name) && !empty($price) && !empty($maxStorage))
    {

        $refPlanManager = new RefPlanPdoManager();
        $criteria = array(
            '_id' => new MongoId($id),

        );

        $updatePlan = array(
           '$set' => array('name' => $name,
            'price' => new MongoInt32($price),
            'maxStorage' => new MongoInt32($maxStorage),
            'downloadSpeed' => new MongoInt32($dl),
            'uploadSpeed' => new MongoInt32($up),
            'maxRatio' => new MongoInt32($maxRatio),
            'state' => new MongoInt32(1))
        );
//        $updatePlan = array(
//            '$set' => array('name' => $name)
//        );
        $fields = array(
            'name' => $name,
            'price' => new MongoInt32($price),
            'maxStorage' => new MongoInt32($maxStorage),
            'downloadSpeed' => new MongoInt32($dl),
            'uploadSpeed' => new MongoInt32($up),
            'maxRatio' => new MongoInt32($maxRatio),
            'state' => new MongoInt32(1)
        );
        $options = array('new' => true);

        $editPlan = $refPlanManager->findAndModify($criteria, $updatePlan, null, $options);

        if($editPlan == true)
        {

            $message = 'Your plan has successfully changed';
            $_SESSION['editPlanMessage'] = $message;

            header( 'Location: ../pages/plan.php' );
            die();
        }
        else
        {
            $message = 'Update error';
            $_SESSION['editPlanMessage'] = $message;
            header( 'Location: ../pages/plan.php' );
            die();
        }


    }
}