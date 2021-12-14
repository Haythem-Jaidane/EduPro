
<?php
    include_once '../Model/Forum.php';
    include_once '../Controller/ForumC.php';
    

    $error = "";

    // create forum
    $forum = null;

    // create an instance of the controller
    $forumC = new ForumC();
    if (
        
        isset($_POST["nom_utilisateur"]) &&       
        isset($_POST["email"]) &&
        isset($_POST["sujet"]) &&
        isset($_POST["messageF"]) 
    )
     {
        if (
            
            !empty($_POST['nom_utilisateur']) &&
            !empty($_POST["email"]) &&
            !empty($_POST["sujet"]) &&
            !empty($_POST["messageF"]) 
          
        ) {
            $forum = new forum(
               
                $_POST['nom_utilisateur'],
                $_POST['email'],
                $_POST['sujet'],
                $_POST['messageF'],
                
            );
            $forumC->ajouterForum($forum);
            header('Location:afficherForumF.php');
            
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

    <title>Espace forums</title>

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
              <form id="forum" action="" method="post" onsubmit = "envoie()" >
                <div class="row">
                <button><a href="afficherForumF.php">Retour à la liste des Forums</a></button>
                <div class="col-lg-12">
                    <h2>AJOUTER UNE forum</h2>
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

                  
                  <hr>

     


<!--
                     <div class="col-lg-4">
                    <fieldset>

<div class ="check">
   <div class="row" >
       <input class="col" type="radio" value="harcelement" name="nom_utilisateur" id="harcelement" >
       <label class="col" for="radio">harcelement</label>   
       
   </div>
   <div class="row ">

   
       <input class="col" type="radio" value="contenue" name="nom_utilisateur" id="contenue">
       <label class="col" for="radio2">contenue</label>
      
   </div>
   <div class="row">
   
   
       <input class="col" type="radio" value="divers"  name="nom_utilisateur" id="divers">
       <label class="col" for="radio2">divers</label>
           </div>
           
 </fieldset>
</div>


<div class="col-lg-4" >
                    <fieldset>

<div class ="check" hidden id="suite_harcelement">
   <div class="row" >
       <input class="col" type="radio" value="harcelement" name="nom_utilisateur" id="radio">
       <label class="col" for="radio">harcelement</label>   
       
   </div>
   <div class="row ">

   
       <input class="col" type="radio" value="contenue" name="nom_utilisateur" id="radio">
       <label class="col" for="radio2">contenue</label>
      
   </div>
   <div class="row">
   
   
       <input class="col" type="radio" value="divers"  name="nom_utilisateur" id="radio">
       <label class="col" for="radio2">divers</label>
           </div>
           
 </fieldset>
</div>


<div class="col-lg-4" >
                    <fieldset>

<div class ="check" hidden id="suite_contenue">
   <div class="row" >
       <input class="col" type="radio" value="harcelement" name="nom_utilisateur" id="radio">
       <label class="col" for="radio">contenue inaproprie</label>   
       
   </div>
   <div class="row ">

   
       <input class="col" type="radio" value="contenue" name="nom_utilisateur" id="radio">
       <label class="col" for="radio2">contenue malveillant</label>
      
   </div>
   <div class="row">
   
   
       <input class="col" type="radio" value="divers"  name="nom_utilisateur" id="radio">
       <label class="col" for="radio2">arnaque</label>
           </div>
           
 </fieldset>
</div>
  -->

                <td>
                        <input type="submit" value="Envoyer">
                    </td>
                    <td>
              </form>





              

                            <div id="confirmation" hidden >votre requete a ete enregistre </div>

                          </div>
                        </div>
                      </div>

                
                
                      <!--

        <div class="col-lg-3">
          <div class="right-info">
            <ul>
              <li>
                <h6>Phone Number</h6>
                <span>71.450.450</span>
              </li>
              <li>
                <h6>message Address</h6>
                <span>E_inovation@gmail.com</span>
              </li>
              <li>
                <h6>Street Address</h6>
                <span>res x app10 Ennasr-tunis</span>
              </li>
              <li>
                <h6>Website URL</h6>
                <span>www.E_inovation.edu</span>
              </li>
            </ul>
          </div>
          </div>
           -->
          
            
         
    
    <div class="footer">
     
    </div>
  </section>

  <!-- Scripts -->
  <!-- Bootstrap core JavaScript -->
    
    <script>
        //according to loftblog tut
       
        const suite_harcelement = document.getElementById("harcelement");
        suite_harcelement.addEventListener('click', function(){
          document.getElementById("suite_contenue").hidden = true;
          document.getElementById("suite_harcelement").hidden = false;});

          const suite_contenue = document.getElementById("contenue");
         suite_contenue.addEventListener('click', function(){
          document.getElementById("suite_harcelement").hidden = true;
          document.getElementById("suite_contenue").hidden = false;});
          

          const envoie = document.getElementById("contact");
        envoie.addEventListener('click', function(){
          document.getElementById("confirmation").hidden = false;
         ;});

         function envoie() {
  alert("The form was submitted");
}
    </script>
</body>

</body>
</html>