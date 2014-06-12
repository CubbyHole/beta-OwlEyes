<?php
/**
 * Created by PhpStorm.
 * User: Ken
 * Date: 12/06/14
 * Time: 01:13
 */
// On appelle la session
session_start();

// On écrase le tableau de session
$_SESSION['owleyesOK'] = array();

// On détruit la session
session_destroy();

//redirection vers le dashboard
header('Location: login.php');