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

$accountManager = new AccountPdoManager();

$userManager = new UserPdoManager();
$account = $accountManager->findById($id);
$user =  $accountManager->findById($id);

//Critère de recherche pour le compte
$criteriaAccount = array(
    '_id' => new MongoId($account->getId())
);

//Critère de recherche pour le user
$criteriaUser = array(
    '_id' => new MongoId($account->getUser())
);

$updateCriteria = array(
    '$set' => array('state' => new MongoInt32(0))
);
var_dump($criteriaUser);
var_dump($updateCriteria);

$disableUserAccount = $accountManager->findAndModify($criteriaAccount, $updateCriteria, NULL, array('new' => TRUE));
$disableUser = $userManager->findAndModify($criteriaUser, $updateCriteria, NULL, array('new' => TRUE));

header( 'Location: ../pages/users.php' );

