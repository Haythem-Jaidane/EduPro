


<html lang="en">

  <head>
      <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="TemplateMo">
        <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900" rel="stylesheet">

        <title>E_innov@tion</title>

        <!-- Bootstrap core CSS -->
        <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <!-- Additional CSS Files -->
        <link rel="stylesheet" href="assets/css/fontawesome.css">
        <link rel="stylesheet" href="assets/css/templatemo-edu-meeting.css">
        <link rel="stylesheet" href="assets/css/owl.css">
        <link rel="stylesheet" href="assets/css/lightbox.css">
    <!-- TemplateMo 569 Edu Meeting https://templatemo.com/tm-569-edu-meeting -->
  </head>

    <body>

        <!-- ***** Header Area Start ***** -->
          <header class="header-area header-sticky">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <nav class="main-nav">
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
                                <li class="scroll-to-section"><a href="#contact" class="active" >reclamations</a></li> 
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


<!-- formulaire reclamations-->

  <section class="contact-us" id="contact">
    <div class="container">
      <div class="row">
        <div class="col-lg-9 align-self-center">
          <div class="row">
            <div class="col-lg-12">
              <form id="contact" action="http://localhost:8888/bd%20php/View/afficherReclamation.php"  method="post"   >
                <div class="row">
                  <div class="col-lg-12">
                    <h2>Reclamationss</h2>
                  </div>
                  <div class="col-lg-4">
                    <fieldset>
                      <input name="nomUtilisateur" type="text" id="nomUtilisateur" placeholder="username...*" required="" >
                    </fieldset>
                  </div>
                  <hr>
                    <div class="col-lg-12">
                    <h2>type de reclamations</h2>
                    </div>


<!--
                     <div class="col-lg-4">
                    <fieldset>

<div class ="check">
   <div class="row" >
       <input class="col" type="radio" value="harcelement" name="typer" id="harcelement" >
       <label class="col" for="radio">harcelement</label>   
       
   </div>
   <div class="row ">

   
       <input class="col" type="radio" value="contenue" name="typer" id="contenue">
       <label class="col" for="radio2">contenue</label>
      
   </div>
   <div class="row">
   
   
       <input class="col" type="radio" value="divers"  name="typer" id="divers">
       <label class="col" for="radio2">divers</label>
           </div>
           
 </fieldset>
</div>


<div class="col-lg-4" >
                    <fieldset>

<div class ="check" hidden id="suite_harcelement">
   <div class="row" >
       <input class="col" type="radio" value="harcelement" name="typer" id="radio">
       <label class="col" for="radio">harcelement</label>   
       
   </div>
   <div class="row ">

   
       <input class="col" type="radio" value="contenue" name="typer" id="radio">
       <label class="col" for="radio2">contenue</label>
      
   </div>
   <div class="row">
   
   
       <input class="col" type="radio" value="divers"  name="typer" id="radio">
       <label class="col" for="radio2">divers</label>
           </div>
           
 </fieldset>
</div>


<div class="col-lg-4" >
                    <fieldset>

<div class ="check" hidden id="suite_contenue">
   <div class="row" >
       <input class="col" type="radio" value="harcelement" name="typer" id="radio">
       <label class="col" for="radio">contenue inaproprie</label>   
       
   </div>
   <div class="row ">

   
       <input class="col" type="radio" value="contenue" name="typer" id="radio">
       <label class="col" for="radio2">contenue malveillant</label>
      
   </div>
   <div class="row">
   
   
       <input class="col" type="radio" value="divers"  name="typer" id="radio">
       <label class="col" for="radio2">arnaque</label>
           </div>
           
 </fieldset>
</div>
  -->

  

               <div class="col-lg-12" style="margin-bottom: 20px;">
                    <fieldset>
                     
                      <?php
                              require_once '../config.php';
                              include_once '../Controller/type_reclamationC.php';
                              $id = null; 
                              $pdo = config::getConnexion() ;
                              $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION) ;
                              $sql = "SELECT * FROM type_reclamation ";
                              $q = $pdo->prepare($sql);
                              $q->execute(array($id));
                              $data = $q->fetch(PDO::FETCH_ASSOC);
                              config::disconnect();
                              $typeReclamation = new typeReclamationC();
                              $resultat=$typeReclamation->afficherTypeReclamation();
                          
                            ?>

                          <select class="form-select" aria-label="Default select example" name="typer"  id="typer">
                              <option selected>Open this select menu</option>
                                <?php foreach($resultat as $row) { 
                                  echo '<option value= "' . $row['libelle_typeReclamation'] . '  ">' . $row['libelle_typeReclamation'] . '</option> ' ;}  
                                  ?>
                                  
                              <option  value = "" >autre...</option>
                          </select>

                    </fieldset>
                </div>


                <div class="col-lg-12">
                    <h2>explication</h2>
                </div>

                    <fieldset>
                      <textarea name="explication" type="text" class="form-control" id="explication" placeholder="YOUR MESSAGE..." required=""></textarea>
                    </fieldset>
                  </div>

                    <td>
                    <a href="afficherReclamation.php"><input type="submit" value="Envoyer"  class="form-control" onclick="myFunction2();myFunction();"></a>
                    </td>

                    
                    
                  
                    <i class="material-icons text-sm me-2">edit</i>Edit</a>
            </form>





              <!-- form ajout type -->





              <div class="col-lg-12">
                <form id="contact" action="" method="post" onsubmit = "envoie()" >
                <div class="col-lg-4"  >
                      <fieldset>
                      <input name="libelle_typeReclamations" type="text" id="libelle_typeReclamations" placeholder="libelle...*" required=""  style="margin-top: 20px;"  > 
                      </fieldset>
                      </div> 

                      <div class="col-lg-4"  >
                      <fieldset>
                      
                      <input type="submit" value="Envoyer" >                 
                      </fieldset>
                      
                      </div> 

                       </div>
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
  <button type="button" >Verifier vos données</button>

<script >
var b =document.getElementById("mybtn")

b.addEventListener("CLICK",myFunction() { alert ('WRONG') } ) ;
</script>


<script>
function myFunction2() {
  // Get the value of the input field with id
  let x = document.getElementById("email").value;
  // If x is Not a Number or less than one or greater than 10
  let text;
  if (x.indexOf('@esprit.tn')==-1){
    text = "Input not valid";
  } else {
    text = "Input OK" ;
  }
  document.getElementById("demo_2").innerHTML = text;
}
</script>
    <script>

       
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