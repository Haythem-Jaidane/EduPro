<?php
include_once '../model/User2.php';
require_once '../controller/User2C.php';

if (
    isset($_POST['firstname']) &&
    isset($_POST['lastname']) &&
    isset($_POST['email']) &&
    isset($_POST['password']) &&
    isset($_POST['id'])

) {
    $pass = md5($_POST['password']);
    $user = new User($_POST['lastname'],$_POST['firstname'],$pass,$_POST['email']);
    $userC = new UserC();
    $userC->modifierUser($user,$_POST['id']);
    header('Location: indexfront.php');
} else 
    header('Location: indexfront.php');



?>