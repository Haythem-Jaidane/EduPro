<?php
session_start();
//if (isset($_SESSION['ID'])) {
    unset($_SESSION['id']);
    unset($_SESSION['nom']);
    unset($_SESSION['verified']);
    unset($_SESSION['prenom']);
    unset($_SESSION['email']);
//    echo 'deconnected';
//}
header('Location: indexfront.php');
?>