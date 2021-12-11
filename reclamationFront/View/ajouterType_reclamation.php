

<?php
    include_once '../Model/type_reclamation.php';
    include_once '../Controller/type_reclamationC.php';
   

    $error = "";

    // create reclamation
    $typeReclamation = null;

    // create an instance of the controller
    $typeReclamationC = new typeReclamationC();
    if (
        
        isset($_POST["libelle_typeReclamation"])      
        
    ) {
        if (
            
            !empty($_POST['libelle_typeReclamation']) 
           
        ) {
            $typeReclamation = new typeReclamation(
               
                $_POST['libelle_typeReclamation']
                
            );
            $typeReclamationC->ajouterTypeReclamation($typeReclamation);
            header('Location:afficherListeType_reclamation.php');
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
                          <li class="scroll-to-section"><a href="#contact" class="active" >reclamation</a></li> 
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


<!--contaaact formulaire reclamation-->
  <section class="contact-us" id="contact">
    <div class="container">
      <div class="row">
        <div class="col-lg-9 align-self-center">
          <div class="row">
            <div class="col-lg-12">
              <form id="contact"  method="post" >
                <div class="row">
                  <div class="col-lg-12">
                    <h2>libelle du type </h2>
                  </div>
                  
                  <div class="col-lg-4">
                    <fieldset>
                      <input name="libelle_typeReclamation" type="text" id="libelle_typeReclamation" placeholder="libelle...*" required="">
                    </fieldset>
                  </div>
                  
                  <hr>



                   
                    <td>
                        <input type="submit" value="Envoyer">
                    </td>
                    <td>
              </form>
              <div id="confirmation" hidden >votre requete a ete enregistre </div>

            </div>
          </div>
        </div>
        <div class="col-lg-3">
          <div class="right-info">
            <ul>
              <li>
                <h6>Phone Number</h6>
                <span>71.450.450</span>
              </li>
              <li>
                <h6>Email Address</h6>
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
            
          <div class="right-info"  style="margin-top: 10px;" >
            <ul>
              <li>
                <h6>Phone Number</h6>
                <span>71.450.450</span>
              </li>
              <li>
                <h6>Email Address</h6>
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
     
      </div>
    </div>

    
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

    </script>
</body>

</body>
</html>