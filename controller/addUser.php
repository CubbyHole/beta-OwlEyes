<?php
/**
 * Created by PhpStorm.
 * User: Ken
 * Date: 13/06/14
 * Time: 14:32
 */
session_start();
$projectRoot = $_SERVER['DOCUMENT_ROOT'].'/OwlEyes';
require_once $projectRoot.'/required.php';
if(isset($_POST['add_user']))
{
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $geo = $_POST['geo'];
    $plan = $_POST['plan'];
    $state = $_POST['state'];

    if(isset($_POST['isAdmin']))
    {
        $isAdmin = $_POST['isAdmin'];
        $isAdmin = true;
        var_dump($isAdmin);
    }
    else
    {
        $isAdmin = false;
        var_dump($isAdmin);
    }

    $userManager = new UserPdoManager();
    $accountManager = new AccountPdoManager();
    $planManager = new RefPlanPdoManager();


    //Verifie la disponibilité de l'adresse mail
    if($userManager->checkEmailAvailability($email) != FALSE)
    {
        $accountId = new MongoId();
        $userId = new MongoId();
        //crypte le password
        $password = $userManager->encrypt($password);
        //@link http://www.php.net/manual/en/class.mongodate.php
        $time = time();
        $end = $time + (30 * 24 * 60 * 60); // + 30 jours

        //info compte
        $account = array(
            '_id' => $accountId,
            'state' => new MongoInt32($state),
            'idUser' => $userId,
            'idRefPlan' => new MongoId($plan),
            'storage' => (int)0,
            'ratio' => (int)0,
            'startDate' => new MongoDate($time),
            'endDate' => new MongoDate($end)
        );
        $isAccountAdded = $accountManager->create($account);

        //Si aucun pb apres ajout du compte, ajoute l'user, sinon suppresion de user
        if($isAccountAdded == TRUE)
        {
            //infos user
            $user = array(
                '_id' => $userId,
                'isAdmin' => $isAdmin,
                'state' => new MongoInt32($state),
                'idCurrentAccount' => $accountId,
                'firstName' => _sanitize($firstname),
                'lastName' => _sanitize($lastname),
                'password' => $password,
                'email' => $email,
                'geolocation' => $geo,
                'apiKey' => $userManager->generateGUID()
            );

            $isUserAdded = $userManager->create($user);

            if($isUserAdded != TRUE)
            {
                //annule l'insertion de l'account
                $removeAccount = $accountManager->remove($account);

                if($removeAccount == TRUE)
                    $isUserAdded['error'] .= 'The account created for this user has been removed successfully.';
                else
                    $isUserAdded['error'] .= 'The account created for this user has not been removed successfully: '
                        .$removeAccount;   //contient le détail de l'erreur de suppression
            }
            else
            {
                $message = 'User <strong>'.$firstname.'</strong> has been inserted in database';
                $_SESSION['addUserMessage'] = $message;
                header( 'Location: ../pages/users.php' );
            }
            return $isUserAdded;


        }
        else return $isAccountAdded; //Message d'erreur approprié
    }
    else
    {
        $errorEmail = 'Email <strong>'.$email.'</strong> already used';

        $_SESSION['addUserMessageError'] = $errorEmail;
        header( 'Location: ../pages/addUser.php' );
    }

}