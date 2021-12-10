<?php

  include '../Model/Panier.php';
  include "../Controller/PanierC.php";

  $Produit = new ItemC();
  $commande= new CommandeC();

  if (
    isset($_GET["opp"]) &&
    isset($_GET["i"])
) {

  $h=$Produit->recupererItem($_GET["i"]);

  $Item = new Item($h["ID"],$h["Prix"],$h["Quantite"],$h["image_link"],$h["Nom"],$h["id_commande"]);


  if($_GET["opp"]=="sub"){
    $Produit->Sub($Item);
  }

  if($_GET["opp"]=="add"){
    $Produit->Add($Item);
  }

  if($_GET["opp"]=="/"){
    $Produit->supprimerItem($_GET["i"]);
    echo "tt";
  }
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

    <title>Education Template - Meeting Detail Page</title>

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
                          <li><a href="meetings.html" class="active">Meetings</a></li>
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

                          <li>
                            <a href="panier.php">
                              <i class="fa fa-shopping-cart" style="font-size:24px;color:white;"><?php echo $Produit->length();?></i>
                            </a>
                          </li>
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
          <h6>Get all details</h6>
          <h2>Online Teaching and Learning Tools</h2>
        </div>
      </div>
    </div>
  </section>

  <section class="meetings-page" id="meetings">
    <div class="container">
      <div style="background-color: beige;border-radius: 5%;text-align: center;margin-top:20px;margin-bottom: 50px;padding: 3%;">
        <h1 style="margin:5%">Formation et Document</h1>
        <?php
          $resultat=$Produit->afficherItem($commande->IdNonActive(20)["id_commande"]);
          echo"<table style='margin:5%'>";
          echo"<tr>";
          echo"<th></th>";
          echo"<th>Nom de l'article</th>";
          echo"<th>Quantité</th>";
          echo"<th>Rrix D'un Article</th>";
          echo"<th>Prix Total</th>";
          echo"</tr>";
          foreach($resultat as $i){
            echo"<tr style='width: 80%;margin:10%;'>";
            echo"<td style='width: 25%;'><img src=".$i['image_link']."></td>";
            echo"<td>".$i['Nom']."</td>";
            echo"<td><a href='panier.php?opp=sub&i=".$i['ID']."'>-</a>".$i['Quantite']."<a href='panier.php?opp=add&i=".$i['ID']."'>+</a></td>";
            echo"<td>".$i['Prix']."</td>";
            echo"<td>".$i['Quantite']*$i['Prix']."</td>";
            echo"<td><a href='panier.php?opp=/&i=".$i['ID']."'>Supprimer</a></td>";
            echo"</tr>";
          }
          echo"</table>";
        ?>
        <div>
          <a href="payment.html">Finaliser Votre Commande</a>
          <a href="produit.php">Poursuivre Votre apprentissage</a>
        </div>
        <a href="historique.php">Historique de commande</a>
      </div>  
    </div>
    <div class="footer">
      
    </div>
  </section>


  <!-- Scripts -->
  <!-- Bootstrap core JavaScript -->
   
    <script>
        //according to loftblog tut
        $('.nav li:first').addClass('active');

        var showSection = function showSection(section, isAnimate) {
          var
          direction = section.replace(/#/, ''),
          reqSection = $('.section').filter('[data-section="' + direction + '"]'),
          reqSectionPos = reqSection.offset().top - 0;

          if (isAnimate) {
            $('body, html').animate({
              scrollTop: reqSectionPos },
            800);
          } else {
            $('body, html').scrollTop(reqSectionPos);
          }

        };

        var checkSection = function checkSection() {
          $('.section').each(function () {
            var
            $this = $(this),
            topEdge = $this.offset().top - 80,
            bottomEdge = topEdge + $this.height(),
            wScroll = $(window).scrollTop();
            if (topEdge < wScroll && bottomEdge > wScroll) {
              var
              currentId = $this.data('section'),
              reqLink = $('a').filter('[href*=\\#' + currentId + ']');
              reqLink.closest('li').addClass('active').
              siblings().removeClass('active');
            }
          });
        };

        $('.main-menu, .responsive-menu, .scroll-to-section').on('click', 'a', function (e) {
          e.preventDefault();
          showSection($(this).attr('href'), true);
        });

        $(window).scroll(function () {
          checkSection();
        });
    </script>
</body>


  </body>

</html>
