
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

  
  
  <section class="heading-page header-text" id="top">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <h2>ESPACE FICHIER</h2>
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
            


              <div class="meeting-single-item">

                <div class="">
                  <div class="price">
                    
                  </div>
                  <div class="date">
                  
                  </div>
                
                </div>
                <div class="down-content">
                  
                  <form action="ajouterRessource.php?code_formation=<?php echo $_GET['code_formation']?>" method="post" enctype="multipart/form-data">
 
SELECTIONNEZ LE FICHIER A INSERER:
 <input type="file" name="fileToUpload" id="fileToUpload">
 <input type="submit" value="ENVOYER" name="submit">
</form>
                    
                  
                    
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-12">
              <div class="main-button-red">
                <a href="ajouterFormation.php">Back</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="footer">
      <p>Copyright © 2022 Edu Meeting Co., Ltd. All Rights Reserved. 
          <br>Design: <a href="https://templatemo.com" target="_parent" title="free css templates">TemplateMo</a></p>
    </div>
  </section>



  
  





  




</body>
</html>