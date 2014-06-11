<?php
/**
 * Created by PhpStorm.
 * User: Ken
 * Date: 10/06/14
 * Time: 15:02
 * Permet la désactivation d'un Plan
 */
$projectRoot = $_SERVER['DOCUMENT_ROOT'].'/OwlEyes';
require_once $projectRoot.'/required.php';
$id = $_GET['id'];
var_dump($id);

$refPlanManager = new RefPlanPdoManager();
$criteria = array(
    '_id' => new MongoId($id)
);
$updateCriteria = array(
    '$set' => array('state' => (int)0)
);

$disablePlan = $refPlanManager->findAndModify($criteria, $updateCriteria, NULL, array('new' => TRUE));

header( 'Location: ../pages/plan.php' );

