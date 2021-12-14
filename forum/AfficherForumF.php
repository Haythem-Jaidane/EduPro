<?php
	include '../Controller/ForumC.php';
	$ForumC=new ForumC();
	$listeforum=null;
	$listeforum=$ForumC->{"afficherForum$listeforum"}(); 
?>
<html>
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
<section class="contact-us" id="contact">
  <div class="container">
	<div class="row">
	  <div class="col-lg-9 align-self-center">
		<div class="row">
		  <div class="col-lg-12">
	<body>
	    <button><a href="ajouterForum.php">Ajouter un Forum</a></button>
		<center><h1>Liste des Forum</h1></center>
		<table border="1" align="center">
			<tr>
				<th>nom_utilisateur</th>

				<th>sujet</th>
				<th>messageF</th>
>
			</tr>
			<?php
				foreach($listeforum as $Forum){
			?>
			<tr>
				<td><?php echo $Forum['nom_utilisateur']; ?></td>

				<td><?php echo $Forum['sujet']; ?></td>
				<td><?php echo $Forum['messageF']; ?></td>
				
			</tr>
			<?php
				}
			?>
		</table>
		<div class="footer">
     
	 </div>
	</body>
</html>
