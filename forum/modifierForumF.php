<?php
    include_once '../Model/Forum.php';
    include_once '../Controller/ForumC.php';

    $error = "";

    // create Forum
    $Forum = null;

    // create an instance of the controller
    $ForumC = new ForumC();
    if (
        isset($_POST["nom_utilisateur"]) &&       
        isset($_POST["email"]) &&
        isset($_POST["sujet"]) &&
        isset($_POST["messageF"]) 
    )
     {
        if (
            !empty($_POST["nom_utilisateur"]) &&
            !empty($_POST["email"]) &&
            !empty($_POST["sujet"]) &&
            !empty($_POST["messageF"])
        ) {
            $Forum = new Forum(
                $_POST['nom_utilisateur'],
                $_POST['email'],
                $_POST['sujet'],
                $_POST['messageF'],
            );
            $ForumC->modifierForum($Forum, $_POST["nom_utilisateur"]);
            header('Location:afficherForum.php');
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
                        <li class="scroll-to-section"><a href="#contact" class="active" >forum</a></li> 
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
        <h2>ESPACE forumS</h2>
      </div>
    </div>
  </div>
</section>


<!--contaaact formulaire reclamation-->
<section class="contact-us" id="forum">
  <div class="container">
    <div class="row">
      <div class="col-lg-9 align-self-center">
        <div class="row">
          <div class="col-lg-12">
    <body>
        <button><a href="afficherForum.php">Retour à la liste des Forums</a></button>
        <hr>
        
        <div id="error">
            <?php echo $error; ?>
        </div>
			
		<?php
			if (isset($_POST['nom_utilisateur'])){
				$Forum = $ForumC->recupererForum($_POST['nom_utilisateur']);
            }		
		?>
        
        <form action="" method="POST">
        <div class="col-lg-4">
                    <fieldset>
                      <input name="nom_utilisateur" type="text" id="nom_utilisateur" placeholder="VOTRE NOM D'UTILISATEUR...*" required="">
                    </fieldset>
                  </div>

                 

                  <div class="col-lg-4">
                    <fieldset>
                      <input name="email" type="text" id="email" placeholder="EMAIL...*" required="">
                    </fieldset>
                  </div>

                  <div class="col-lg-4">
                    <fieldset>
                      <input name="sujet" type="text" id="sujet" placeholder="LE SUJET...*" required="">
                    </fieldset>
                  </div>
                 
                  <div class="col-lg-4">
                    <fieldset>
                      <input name="messageF" type="text" id="messageF" placeholder="AJOUTER LE message...*" required="">
                    </fieldset>
                  </div>
                  <td>
                        <input type="submit" value="Envoyer">
                    </td>
                    <td>
              </form>
        </form>
        <div class="footer">
     
     </div>
    </body>
</html>