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
$addPlanOK = false;

//Traitement pour l'ajout du plan en bdd
if(isset($_POST['add_plan']))
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
        $newPlan = array(
            'name' => $name,
            'price' => new MongoInt32($price),
            'maxStorage' => new MongoInt32($maxStorage),
            'downloadSpeed' => new MongoInt32($dl),
            'uploadSpeed' => new MongoInt32($up),
            'maxRatio' => new MongoInt32($maxRatio),
            'state' => new MongoInt32(1)
        );
        $addPlan = $refPlanManager->create($newPlan);
        $addPlanOK = true;


            $message = 'Your plan has successfully inserted';
            $_SESSION['addPlanMessage'] = $message;


        header( 'Location: ../pages/plan.php' );

    }
}