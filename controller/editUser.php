<?php
/**
 * Created by PhpStorm.
 * User: Ken
 * Date: 11/06/14
 * Time: 11:09
 */
session_start();
$projectRoot = $_SERVER['DOCUMENT_ROOT'].'/OwlEyes';
require_once $projectRoot.'/required.php';
$id = $_GET['id'];

if(isset($_POST['edit_user']))
{


    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $geo = $_POST['geo'];
    $startDate = strtotime($_POST['startDate']);
    $endDate = strtotime($_POST['endDate']);
    $plan = $_POST['plan'];
    var_dump($startDate);
    var_dump($endDate);

    if($startDate == FALSE || $endDate == FALSE)
    {
        $message =  'Invalid date. It may be because you are not using the YYYY-MM-DD format or your date is after Tuesday, 19th January 2038, date that is not handled';
        $_SESSION['editUserInvalidMessage'] = $message;
        header( 'Location: ../pages/users.php' );
        die();


    }

    $userManager = new UserPdoManager();
    $accountManager = new AccountPdoManager();
    $planManager = new RefPlanPdoManager();

//    $sDate = $userManager->formatMongoDate($startDate);
//    $eDate = $userManager->formatMongoDate($endDate);

    $account = $accountManager->findById($id);//récupère l'idAccount
    $user = $account->getUser();//récupère l'idUser
    $user = $userManager->findById($user);//récupère ensuite les infos user byId

    $criteriaAccount = array(
        '_id' => new MongoId($account->getId())
    );

    $criteriaUser = array(
        '_id' => new MongoId($user->getId())
    );

    $updateFieldAccount = array(
        '$set' => array(
            'startDate' => new MongoDate($startDate),
            'endDate' => new MongoDate($endDate),
            'idRefPlan' => new MongoId(_sanitize($plan)),
            'state' => new MongoInt32(1)
        )
    );

    $updateFieldUser = array(
        '$set' => array(
         'firstName' => _sanitize($firstname),
            'lastName' => _sanitize($lastname),
            'password' => _sanitize($password),
            'email' => _sanitize($email),
            'geo' => _sanitize($geo),
            'state' => new MongoInt32(1)
        )
    );

    $options = array('new' => true);
//    var_dump($updateFieldAccount);

    $editAccount = $accountManager->findAndModify($criteriaAccount, $updateFieldAccount, NULL, $options);
    $editUser = $userManager->findAndModify($criteriaUser, $updateFieldUser, NULL, $options);

//    var_dump($criteriaAccount);
//    var_dump($criteriaUser);
//    echo '</br>';
//    echo '----------';
//    var_dump($updateFieldAccount);
//    var_dump($updateFieldUser);
   // exit();
    if($editAccount && $editUser == TRUE)
    {
        if(!(array_key_exists('error', $editAccount)))
        {
            $message = 'User'.' <strong>'.$firstname.'</strong> '.'has been successfully modified';
            $_SESSION['editUserMessage'] = $message;
            header( 'Location: ../pages/users.php' );
            die();
        }
        else
        {
            $message = 'An error was encountered during update of'.$firstname;
            $_SESSION['editUserMessage'] = $message;
            header('Location:../pages/users.php');
            die();
        }



    }


}