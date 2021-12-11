<?php require '../config.php'; $nom_utilisateur = null; if ( !empty($_GET['nom_utilisateur'])) { $nom_utilisateur = $_REQUEST['nom_utilisateur']; } if ( null==$nom_utilisateur ) { header("Location: afficherFormation.php"); } if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST)) { 
      $nom_formationError = null; 
      $niveau_formationError = null; 
      $type_de_ressourceError = null;
      $fichierError = null;
      $nom_utilisateurError = null; 
// On assigne nos valeurs
       $nom_formation = $_POST['nom_formation']; 
       $niveau_formation = $_POST['niveau_formation']; 
        $type_de_ressource = $_POST['type_de_ressource'];
        $fichier = $_POST['fichier'];
         $nom_utilisateur = $_POST['nom_utilisateur']; 
         // On verifie que les champs sont remplis 
         $valid = true; 
         if (empty($nom_formation)) { $nom_formationError = 'Please enter nom_formation'; $valid = false; } if (empty($niveau_formation)) { $niveau_formationError = 'Please enter your name'; $valid = false; } if (empty($type_de_ressource)) { $type_de_ressourceError = 'Please enter type_de_ressource$type_de_ressource'; $valid = false; } if (empty($fichier)) { $fichierError = 'Please enter Email Address'; $valid = false; } else if (!filter_var($fichier, FILTER_VALIDATE_EMAIL)) { $fichierError = 'Please enter a valid Email Address'; $valid = false; }  if (empty($sujet)) { $sujetError = 'Please enter phone'; $valid = false; }  if  (!isset($nom_utilisateur)){ $nom_utilisateurError = 'Please enter website nom_utilisateur'; $valid = false; } 
         // mise à jour des donnés 
         if ($valid) { $pdo = config::getConnexion();
             $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
             $sql = "UPDATE reclamation SET nom_formation = ?, niveau_formation = ?, type_de_ressource = ?, fichier = ?, nom_utilisateur = ?  WHERE nom_utilisateur = ?";
             $q = $pdo->prepare($sql);
             $q->execute(array($nom_formation, $niveau_formation ,$type_de_ressource, $fichier,  $nom_utilisateur ,$nom_utilisateur));
             config::disconnect();
             header("Location: afficherListeReclamation.php");
             
         } 
        }else {
            
            $pdo = config::getConnexion();
             $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
             $sql = "SELECT * FROM formation where nom_utilisateur = ?";
             $q = $pdo->prepare($sql);
             $q->execute(array($nom_utilisateur));
             $data = $q->fetch(PDO::FETCH_ASSOC);
             $nom_formation = $data['nom_formation'];
             $niveau_formation = $data['niveau_formation'];
             $type_de_ressource = $data['type_de_ressource'];
             $fichier = $data['fichier'];
             $nom_utilisateur = $data['nom_utilisateur'];
             config::disconnect();
         }
     
     ?>

<!DOCTYPE html>
<html>
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
<div class="row">

<br />
<h3>Modifier une formation</h3>
<p>

</div>
<p>

<br />
<form method="post" action="update.php?nom_utilisateur=<?php echo $nom_utilisateur ;?>">

<br />
<div class="control-group <?php echo!empty($nom_formationError) ? 'error' : ''; ?>">
                    <label class="control-label">Nom de la formation</label>

<br />
<div class="controls">
                        <input name="nom_formation" type="text"  placeholder="nom_formation" value="<?php echo!empty($nom_formation) ? $nom_formation : ''; ?>">
                        <?php if (!empty($nom_formationError)): ?>
                            <span class="help-inline"><?php echo $nom_formationrror; ?></span>
                        <?php endif; ?>
</div>
<p>

</div>
<p>



<br />
<div class="control-group<?php echo!empty($niveau_formationError) ? 'error' : ''; ?>">
                    <label class="control-label">Niveau de la formation</label>

<br />

<div class="controls">
                        <input type="text" name="niveau_formation" value="<?php echo!empty($niveau_formation) ? $niveau_formation : ''; ?>">
                        <?php if (!empty($niveau_formationError)): ?>
                            <span class="help-inline"><?php echo $niveau_formationError; ?></span>
                        <?php endif; ?>
</div>
<p>

</div>

<div class="controls">
                        <input type="text" name="type_de_ressource" value="<?php echo!empty($type_de_ressource) ? $type_de_ressource : ''; ?>">
                        <?php if (!empty($type_de_ressourceError)): ?>
                            <span class="help-inline"><?php echo $type_de_ressourceError; ?></span>
                        <?php endif; ?>
</div>
<p>

</div>
<p>
<br />
<div class="control-group <?php echo!empty($fichierError) ? 'error' : ''; ?>">
                    <label class="control-label">TYPE DE FICHIER</label>

<br />
<div class="controls">
                        <input name="fichier" type="text" placeholder="Email Address" value="<?php echo!empty($fichier) ? $fichier : ''; ?>">
                        <?php if (!empty($fichierError)): ?>
                            <span class="help-inline"><?php echo $fichierError; ?></span>
                        <?php endif; ?>
</div>






<p>

</div>
<p>



<br />

<p>

</div>
<p>







<br />
<div class="control-group <?php echo!empty($nom_utilisateurError) ? 'error' : ''; ?>">
                    <label class="control-label">nom_utilisateuraire </label>
                    <br />
<div class="controls">
                        <textarea rows="4" cols="30" name="nom_utilisateur" ><?php if (isset($nom_utilisateur)) echo $nom_utilisateur; ?></textarea>    
                        <?php if (!empty($nom_utilisateurError)): ?>
                            <span class="help-inline"><?php echo $nom_utilisateurError; ?></span>
                        <?php endif; ?>
</div>
<p>

</div>
<p>


<br />
<div class="form-actions">
                    <input type="submit" class="btn btn-success" name="submit" value="submit">
                    <a class="btn" href="afficherListeReclamation.php">Retour</a>
</div>
<p>

            </form>
<p>



</div>
<p>


    </body>
</html>