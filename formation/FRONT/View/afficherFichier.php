

<?php 
include '../config.php'; 

     
  
$code_formation = $_GET['code_formation'] ;



$pdo = config::getConnexion() ;
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION) ;
$sql = "SELECT * FROM fichier where code_formation ='$code_formation'";
$q = $pdo->prepare($sql);
$q->execute(array($code_formation));
$info = $q->fetch(PDO::FETCH_ASSOC);
config::disconnect();

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>


             <?php
    include_once '../Model/Question.php';
    include_once '../Controller/QuestionC.php';
    

    $error = "";

    // create question
    $question = null;

    // create an instance of the controller
    $questionC = new questionC();
    if (
        
        isset($_POST["nom"]) &&       
        isset($_POST["prenom"]) &&
        isset($_POST["question"]) &&
        isset($_POST["nom_utilisateur"]) 
        
        
    ) {
        if (
            
            !empty($_POST["nom"]) &&
            !empty($_POST["prenom"]) &&
            !empty($_POST["question"]) &&
            !empty($_POST["nom_utilisateur"]) 
        ) {
            $question = new question(
               
                $_POST['nom'],
                $_POST['prenom'],
                $_POST['question'],
                $_POST['nom_utilisateur'],
            );
            $questionC->ajouterQuestion($question);
            
        }
        else
            $error = "Missing inquestion";
    } 
?>


<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Template Mo">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900" rel="stylesheet">

    <title>Education - List of Meetings</title>

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

  <!-- ***** Header Area Start ***** -->
  <header class="header-area header-sticky">
      <div class="container">
          <div class="row">
              <div class="col-12">
                  <nav class="main-nav">
                      <!-- ***** Logo Start ***** -->
                      <a href="index.html" class="logo">
                          EduPro
                      </a>
                      <!-- ***** Logo End ***** -->
                      <!-- ***** Menu Start ***** -->
                      <ul class="nav">
                          <li><a href="index.html">Home</a></li>
                          <li><a href="meetings.html" class="active">Formation</a></li>
                          <li><a href="index.html">Apply Now</a></li>
                          <li class="has-sub">
                              <a href="javascript:void(0)">Pages</a>
                              <ul class="sub-menu">
                                  <li><a href="meetings.html">Upcoming Meetings</a></li>
                                  <li><a href="meeting-details.html">Meeting Details</a></li>
                              </ul>
                          </li>
                          <li><a href="index.html">Courses</a></li> 
                          <li><a href="index.html">Contact Us</a></li> 
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
  <!-- ***** Header Area End ***** -->

  <section class="heading-page header-text" id="top">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <h2>telecharger</h2>
        </div>
      </div>
    </div>
  </section>

  <section class="meetings-page" id="meetings">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="row">
            <div class="col-lg-12">
              <div class="filters">
                <ul>
                
                


                <?php
                 echo '<a  href="'.$info['fichier'].'" >'. $info['fichier'].'</a>'
                ?>

                 
                </ul>
              </div>
            </div>
           
</body>
</html>

        <div class="col-lg-3">
          <div class="right-info">
            <ul>
              <li>
                <h6>Phone Number</h6>
                <span>26 624 003</span>
              </li>
              <li>
                <h6>Email Address</h6>
                <span>EDUPRO@gmail.com</span>
              </li>
              
              <li>
                <h6>Website URL</h6>
                <span>www.edupro.com</span>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
    <div class="footer">
      <p>Copyright © 2022 Edu Meeting Co., Ltd. All Rights Reserved. 
          <br>Design: <a href="https://templatemo.com" target="_parent" title="free css templates">TemplateMo</a></p>
    </div>
  </section>


   