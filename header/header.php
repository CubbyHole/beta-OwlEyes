<?php
/**
 * Created by PhpStorm.
 * User: Ken
 * Date: 12/06/14
 * Time: 09:53
 */
$projectRoot = $_SERVER['DOCUMENT_ROOT'].'/OwlEyes';
require_once $projectRoot.'/required.php';
session_start();

$userManager = new UserPdoManager();
$planManager = new RefPlanPdoManager();
$accountManager = new AccountPdoManager();


if(isset($_SESSION['owleyesOK']))
{
    $userSession = unserialize($_SESSION['owleyesOK']);

    $user = $userManager->findById($userSession->getId());//retrouve l'user connecté grâce à l'id en session
    $userAccount = $accountManager->findById($user->getCurrentAccount());//retrouve le compte user
    $userPlan = $planManager->findById($userAccount->getRefPlan());//retrouve le plan user


    $startDateArray = $accountManager->formatMongoDate($userAccount->getStartDate());
    $endDateArray = $accountManager->formatMongoDate($userAccount->getEndDate());
}
else
{
    header('Location:/OwlEyes/pages/login.php');
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Owl Eyes | Dashboard</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <link rel="shortcut icon" href="/OwlEyes/img/icons/icons.png">

