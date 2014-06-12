<?php
//appel la session
session_start();

//variable de session a false
$loginOK = false;

$projectRoot = $_SERVER['DOCUMENT_ROOT'].'/OwlEyes';
//require $projectRoot.'/controller/functions.php';
require $projectRoot.'/required.php';

//On check si loginForm est bien defini
//S'il est defini alors on entre dans la condition
if(isset($_POST['loginForm'] ))
{
	$email = $_POST['email'];
    $password = $_POST['password'];

    //Avant de se logger on verifie bien que les champs mail et password ne sont pas vide
    if(!empty($email) && !empty($password))
    {
		$userPdoManager = new UserPdoManager();

        $criteria = array(
            'email' => $email,
            'password' => $userPdoManager->encrypt($password),
            'isAdmin' => true
        );

        $user = $userPdoManager->findOne($criteria);
        var_dump($user);
        if(!(array_key_exists('error', $user)))
		{

            $_SESSION['owleyesOK'] = serialize($user);

			//redirection vers index
			header('Location:../index.php');
		}
        else
        {
            $_SESSION['errorMessageLogin'] = $user['error'];
            header('Location:../pages/login.php');
            die();
        }

	}
	
}


