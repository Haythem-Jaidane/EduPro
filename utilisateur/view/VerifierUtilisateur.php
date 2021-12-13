<?php
require '../controller/User2C.php';
session_start();

if (isset($_GET['id'])) {
    $User = new UserC();
    $User->verifUser($_GET['id']);
    echo 'verified';
    $_SESSION['verified']=1;
    $_SESSION['verif']=1;
    header('Location: indexfront.php');
}
//header('Location: index.php');

?>