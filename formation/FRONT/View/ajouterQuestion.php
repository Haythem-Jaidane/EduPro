
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
        isset($_POST["nom_utilisateur"]) &&
        isset($_POST["id_question"]) 
        
    ) {
        if (
            
            !empty($_POST["nom"]) &&
            !empty($_POST["prenom"]) &&
            !empty($_POST["question"]) &&
            !empty($_POST["nom_utilisateur"]) &&
            !empty($_POST["id_question"]) 
        ) {
            $question = new question(
               
                $_POST['nom'],
                $_POST['prenom'],
                $_POST['question'],
                $_POST['nom_utilisateur'],
                $_POST['id_question'],
            );
            $questionC->ajouterQuestion($question);
            
        }
        else
            $error = "Missing inquestion";
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
                          <li class="scroll-to-section"><a href="#contact" class="active" >question</a></li> 
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
          <h2>ESPACE questionS</h2>
        </div>
      </div>
    </div>
  </section>


  <section class="contact-us" id="contact">
    <div class="container">
      <div class="row">
        <div class="col-lg-9 align-self-center">
          <div class="row">
            <div class="col-lg-12">
              <form id="contact" action="" method="post">
                <div class="row">
                  <div class="col-lg-12">
                    <h2> AVEZ-VOUS UNE QUESTION SUR NOS FORMATIONS ?</h2>
                  </div>
                  <div class="col-lg-4">
                    <fieldset>
                      <input name="nom" type="text" id="name" placeholder="VOTRE NOM...*" required="">
                    </fieldset>
                  </div>
                  <div class="col-lg-4">
                    <fieldset>
                    <input name="prenom" type="text" id="name" placeholder="VOTRE PRENOM...*" required="">
                  </fieldset>
                  </div>

                  <div class="col-lg-4">
                    <fieldset>
                    <input name="id_question" type="text" id="name" placeholder="VOTRE ID...*" required="">
                  </fieldset>
                  </div>
                  
                  <div class="col-lg-4">
                    <fieldset>
                    <input name="nom_utilisateur" type="text" id="name" placeholder="LE CREATEUR DE LA FORMATION...*" required="">
                  </fieldset>
                  </div>

                  
                  <div class="col-lg-12">
                    <fieldset>
                      <textarea name="question" type="text" class="form-control" id="name" placeholder=" SAISISSEZ VOTRE QUESTION..." required=""></textarea>
                    </fieldset>
                  </div>

                  <div class="col-lg-12">
                    <fieldset>
                      <button type="submit" id="form-submit" class="button">ENVOYER</button>
                    </fieldset>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
        <div class="col-lg-3">
          <div class="right-info">
            <ul>
              <li>
                <h6>Phone Number</h6>
                <span>010-020-0340</span>
              </li>
              <li>
                <h6>Email Address</h6>
                <span>info@meeting.edu</span>
              </li>
              <li>
                <h6>Street Address</h6>
                <span>Rio de Janeiro - RJ, 22795-008, Brazil</span>
              </li>
              <li>
                <h6>Website URL</h6>
                <span>www.meeting.edu</span>
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

                
                      <!--

        <div class="col-lg-3">
          <div class="right-info">
            <ul>
              <li>
                <h6>Phone Number</h6>
                <span>71.450.450</span>
              </li>
              <li>
                <h6>nom_utilisateur Address</h6>
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
   
  
  <!-- 
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
    -->
</body>

</html>

