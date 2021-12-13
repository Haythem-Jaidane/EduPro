<?php
include_once '../model/User2.php';
require_once '../controller/User2C.php';

if (
    isset($_POST['firstname']) &&
    isset($_POST['lastname']) &&
    isset($_POST['email']) &&
    isset($_POST['password'])
) {
    $pass = md5($_POST['password']);
    $user = new User($_POST['firstname'],$_POST['lastname'],$pass,$_POST['email']);
    $userC = new UserC();
    $email = $_POST['email'];
    $sql="SELECT * FROM utilisateur WHERE  email=:email";
    $db= config::getConnexion();
    $query= $db->prepare($sql);
    $query->execute([
		'email' => $_POST['email']
    ]);
    $account = $query->fetchAll(PDO::FETCH_ASSOC);
if (count($account)!=0) {
    header('Location: signup.php?erreur=1');
}else {

    $userC->ajouterUser($user);
    
    require '../PHPMailer/PHPMailerAutoload.php';

$mail = new PHPMailer;

//$mail->SMTPDebug = 3;                               // Enable verbose debug output

$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'aveaveyro15@gmail.com';                 // SMTP username
$mail->Password = 'ellaba200';                           // SMTP password
$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 587;                                    // TCP port to connect to

$mail->setFrom('noreply@sporthub.com', 'no-reply');
$mail->addAddress($email);     // Add a recipient
//$mail->addAddress('ellen@example.com');               // Name is optional
//$mail->addReplyTo('info@example.com', 'Information');
//$mail->addCC('cc@example.com');
//$mail->addBCC('bcc@example.com');

//$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
$mail->isHTML(true);   
$sqlid = "SELECT * from utilisateur where email=:email"; 
            $db = config::getConnexion();
            $queryid  = $db->prepare($sqlid);
            $queryid->execute([
                'email' => $email,
            ]); 
            $id = $queryid->fetch();   
$link= 'localhost/dhafer/view/VerifierUtilisateur.php?id='.$id['id'];
$mail->Subject = 'Confirmation mail';
$mail->Body = 'Hi,<br>
               Thank you for creating an account . please verify your email address '.$email.' to complete the registration process<br><br>
               <a href="'.$link.'">click here to verify</a><br><br>
               this message was sent from an unmonitored address . Please do not reply to this address.<br><br>Best regards,<br>the admin';
$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

if(!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    echo 'Message has been sent';
}
//---------------------end sending mail -----------//


//header('Location: indexfront.php');


}
} else 
    header('Location: login.php');



?>