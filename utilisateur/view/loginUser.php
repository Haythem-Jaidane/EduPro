<?php
require '../config.php';
session_start();
if(isset($_POST['email']) && isset($_POST['password']))
{   // on applique les deux fonctions mysqli_real_escape_string et htmlspecialchars
    // pour éliminer toute attaque de type injection SQL et XSS
    $email =htmlspecialchars($_POST['email']); 
    $pass = htmlspecialchars($_POST['password']);
    $password = md5($pass);
   // signin(usename,password)
   $sql="SELECT * FROM Utilisateur WHERE email=?";
   $db= config::getConnexion();
   $query= $db->prepare($sql);
   $query->execute([$email]);
   $signin = $query->fetchAll(PDO::FETCH_ASSOC);
//on a enregistrer dans $signin le user qui a $username comme saisi de la base de donnée
    if (count($signin) != 0) { //username existe
        foreach ($signin as $key ) {
                $user_password = $key['password'];
                $user_lastname = $key['nom'];
                $user_firstname = $key['prenom'];
                $user_id = $key['id'];
                $user_verified = $key['verified'];
                $user_email = $key['email'];



                
        }

        if ($user_password == $password) {
            $_SESSION['nom']=$user_lastname;
            $_SESSION['prenom']=$user_firstname;
            $_SESSION['ID']=$user_id;
            $_SESSION['verified']=$user_verified;
            $_SESSION['email']=$user_email;
            header('Location: indexfront.php');
        }else {
            header('Location: login.php?erreur=2');
        }


    }else {
        header('Location: login.php?erreur=1');
    }


}
else
{
   header('Location: index.php');
}
?>