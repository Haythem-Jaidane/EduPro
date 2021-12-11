<?php

include '../config.php';


if(isset($_POST['submit'])){

$target_file = "upload/" .  basename( $_FILES["fileToUpload"]["name"]) ;




  if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
    echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
  } else {
    echo "Sorry, there was an error uploading your file.";
  }


$code_formation=$_GET['code_formation'];
$sql="INSERT INTO fichier (fichier , code_formation )  VALUES ('".$target_file."' , '".$code_formation."') ";

$db = config::getConnexion();
try{
  $query = $db->prepare($sql);
  $query->execute();			
}
catch (Exception $e){
  echo 'Erreur: '.$e->getMessage();
}	
}	
?>

<?php
    include_once '../Model/Formation.php';
    include_once '../Controller/FormationC.php';
    
    

    $error = "";

    // create formation
    $formation = null;

    // create an instance of the controller
    $formationC = new formationC();
    if (
        
        isset($_POST["nom_formation"]) &&       
        isset($_POST["niveau_formation"]) &&
        isset($_POST["type_de_ressource"]) &&
        isset($_POST["nom_utilisateur"]) &&
        isset($_POST["code_formation"]) 

        

        
    ) {
        if (
            
            !empty($_POST["nom_formation"]) &&
            !empty($_POST["niveau_formation"]) &&
            !empty($_POST["type_de_ressource"]) &&
            !empty($_POST["nom_utilisateur"]) &&
            !empty($_POST["code_formation"]) 
        ) {
            $formation = new formation(
               
                $_POST['nom_formation'],
                $_POST['niveau_formation'],
                $_POST['type_de_ressource'],
                $_POST['nom_utilisateur'],
                $_POST["code_formation"],
            );
            $formationC->ajouterFormation($formation);
            $code_formation= $_POST['code_formation'];
            ?>
            <script> window.location="http://localhost:8888/Projet/FRONT/View/ajouterRessource.php?code_formation=<?php echo $code_formation ?>"</script>
            <?php
        }
        else
            $error = "Missing information";
    } 


?>



<html lang="en">

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

  <!-- Sub Header -->
  <div class="sub-header">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-sm-8">
          <div class="left-content">
            <p>This is an educational <em>HTML CSS</em> template by TemplateMo website.</p>
          </div>
        </div>
        <div class="col-lg-4 col-sm-4">
          <div class="right-icons">
            <ul>
              <li><a href="#"><i class="fa fa-facebook"></i></a></li>
              <li><a href="#"><i class="fa fa-twitter"></i></a></li>
              <li><a href="#"><i class="fa fa-behance"></i></a></li>
              <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>



<!--menu-->

  <!-- ***** Header Area Start ***** -->
  <header class="header-area header-sticky">
      <div class="container">
          <div class="row">
              <div class="col-12">
                  <nav class="main-nav">
                      <!-- ***** Logo Start ***** -->
                      
                      <!-- ***** Logo End ***** -->
                      <!-- ***** Menu Start ***** -->
                      <ul class="nav">
                          <li class="scroll-to-section"><a href="#top" >Home</a></li>
                          <li><a href="meetings.html">Meetings</a></li>
                          <li class="scroll-to-section"><a href="#apply">Apply Now</a></li>
                          <li class="has-sub">
                              <a href="javascript:void(0)">Pages</a>
                              <ul class="sub-menu">
                                  <li><a href="meetings.html">Upcoming Meetings</a></li>
                                  <li><a href="meeting-details.html">Meeting Details</a></li>
                              </ul>
                          </li>
                          <li class="scroll-to-section"><a href="#courses">Courses</a></li> 
                          <li class="scroll-to-section"><a href="#contact" class="active" >FORMATION</a></li> 
                      </ul>        
                      <a class='menu-trigger'>
                          <span>Menu</span>
                      </a>

                                  <!-- ***** Menu End ***** -->
                  </nav>
              </div>
          </div>
      </div>
  </header>

  <section class="heading-page header-text" id="top">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <h2>ESPACE FORMATIONS</h2>
        </div>
      </div>
    </div>
  </section>


<!--contaaact formulaire reclamation-->
  <section class="contact-us" id="contact">
    <div class="container">
      <div class="row">
        <div class="col-lg-9 align-self-center">
          <div class="row">
            <div class="col-lg-12">
             
              <form id="contact"   method="post" onsubmit = "newDoc()" >
                <div class="row">
                  <div class="col-lg-12">
                    <h2>AJOUTER UNE FORMATION</h2>
                    <h6>Veuillez remplir le formulaire</h6>

                    <br>
                  </div>

                  <div class="col-lg-4">
                    <fieldset>
                      <input name="nom_utilisateur" type="text" id="nom_utilisateur" placeholder="VOTRE NOM D'UTILISATEUR...*" required="">
                    </fieldset>
                  </div>

                  <div class="col-lg-4">
                    <fieldset>
                      <input name="nom_formation" type="text" id="nom_formation" placeholder="NOM DE LA FORMATION..." required="">
                    </fieldset>
                  </div>

                  <div class="col-lg-4">
                    <fieldset>
                      <input name="niveau_formation" type="text" id="niveau_formation" placeholder="NIVEAU DE LA FORMATION...*" required="">
                    </fieldset>
                  </div>
                  
                  <p id="demo"> </p>

                  <div class="col-lg-4">
                    <fieldset>
                      <input name="type_de_ressource" type="text" id="type_de_ressource" placeholder="LE TYPE DE RESSOURCE...*" required="">
                    </fieldset>
                  </div>

                  <div class="col-lg-4">
                    <fieldset>
                      <input name="code_formation" type="text" id="code_formation" placeholder="LE CODE DE LA FORMATION...*" required="">
                    </fieldset>
                  </div>
                  <p id="demo2"> </p>
                  <div class="col-lg-4">
                    

                  </div>

                  
                  <hr>

     



                <td>
                <button type="button" onclick="myFunction();myFunction2();">verifier les donnees </button>
                <input type="submit" value="Envoyer" >
                    </td>
                    <td>
              </form>
           







              

                            <div id="confirmation" hidden >votre requete a ete enregistre </div>

                          </div>
                        </div>
                      </div>

                
                
     
        
          
            
         
    
    <div class="footer">
     
    </div>
  </section>

  
  <script >
var b =document.getElementById("mybtn")

b.addEventListener("CLICK",myFunction() { alert ('WRONG') } ) ;
</script>

<script>

function myFunction() {
  // Get the value of the input field with id
  let x = document.getElementById("niveau_formation").value;
  // If x is Not a Number or less than one or greater than 10
  let text;
  if (isNaN(x) || x < 1 || x > 5) {
    text = "Input not valid";
  } else {
    text = "Input OK";
  }
  document.getElementById("demo").innerHTML = text;
}
</script>

<script>

function myFunction2() {
  // Get the value of the input field with id

  let x = document.getElementById("code_formation").value;
  // If x is Not a Number or less than one or greater than 10
  let text;
  if (isNaN(x) || x < 1 || x > 1000) {
    text = "Input not valid";
  } else {
    text = "Input OK";
  }
  document.getElementById("demo2").innerHTML = text;
}
</script>



</body>

</html>

