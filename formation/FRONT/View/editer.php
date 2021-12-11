<?php require_once('../../config.php'); 
$nom_utilisateur = null; 
if (!empty($_GET['nom_utilisateur'])) { $nom_utilisateur = $_REQUEST['nom_utilisateur']; } if (null == $nom_utilisateur) { header("location:afficherFormation.php"); } else { 
    $pdo = config::getConnexion() ;
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION) ;
    $sql = "SELECT * FROM formation where nom_utilisateur =?";
    $q = $pdo->prepare($sql);
    $q->execute(array($nom_utilisateur));
    $data = $q->fetch(PDO::FETCH_ASSOC);
    config::disconnect();
}



/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>

<!DOCTYPE html>

<head>


<meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
  <meta name="description" content="">
  <meta name="author" content="TemplateMo">
  <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900" rel="stylesheet">

  <title>Education Meeting HTML5 Template</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">


  <!-- Additional CSS Files -->
  <link rel="stylesheet" href="assets/css/fontawesome.css">
  <link rel="stylesheet" href="assets/css/templatemo-edu-meeting.css">
  <link rel="stylesheet" href="assets/css/owl.css">
  <link rel="stylesheet" href="assets/css/lightbox.css">
<!--

TemplateMo 569 Edu Meeting

https://templatemo.com/tm-569-edu-meeting

-->
</head>

    <body>

<br />
<div class="container">


<br />
<div class="span10 offset1">

<br />
<div class="row">

<br />
<h3>Edition</h3>
<p>

</div>
<p>



<br />
<div class="form-horizontal" >

<br />
<div class="control-group">
                        <label class="control-label">Nom de la formation </label>

<br />
<div class="controls">
                            <label class="checkbox">
                                <?php echo $data['nom_formation']; ?>
                            </label>
</div>
<p>

</div>
<p>


<br />
<div class="control-group">
                        <label class="control-label">Niveau de la formation</label>

<br />
<div class="controls">
                            <label class="checkbox">
                                <?php echo $data['niveau_formation']; ?>
                            </label>
</div>
<p>

</div>
<p>


<br />
<div class="control-group">
                        <label class="control-label">Type des ressources</label>

<br />
<div class="controls">
                            <label class="checkbox">
                                <?php echo $data['type_de_ressource']; ?>
                            </label>
</div>
<p>

</div>
<p>
<br />
<div class="control-group">
                        <label class="control-label">Insérez le fichier</label>

<br />
<div class="controls">
                            <label class="checkbox">
                                <?php echo $data['fichier']; ?>
                            </label>
</div>
<p>

</div>
<p>


<br />
<div class="control-group">
                        <label class="control-label">Votre nom d'utilisateur </label>

<br />
<div class="controls">
                            <label class="checkbox">
                                <?php echo $data['nom_utilisateur']; ?>
                            </label>
</div>
<p>

</div>
<p>


<br />

<p>




<p>

</div>
<p>


<br />
<div class="form-actions">
                        <a class="btn" href="index.php">Back</a>
</div>
<p>



</div>
<p>

</div>
<p>


</div>
<p>
<!-- /container -->
    </body>
</html>