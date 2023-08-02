<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">


	

	<!-- Boxicons -->
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
	<link href='https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.css ' rel='stylesheet'>

	<!-- My CSS -->
	<link rel="stylesheet" href="includes/style.css">
 

	<title>Gestion Patients</title>
</head>
<body>


	<!-- SIDEBAR -->
	<section id="sidebar">
		<a href="#" class="brand">
			<i class='bx bxs-clinic'></i>
			<span class="text">Gestion Patients</span>
		</a>
		<ul class="side-menu top">
			<li class="active">
				<a href="dashboard1.php">
          
					<i class='bx bxs-dashboard' ></i>
					<span class="text">Tableau de Bord</span>
				</a>
			</li>
			<li>
				<a href="#">
					<i class='bx bxs-group' ></i>
					<span class="text">Les Médecins</span>
				</a>

                <ul class="sub-menu">
									<li>
										<a href="ajoutDoc.php">
											<span class="title"> Ajouter Docteur</span>
										</a>
									</li>
								


									<li>
										<a href="gererDoc.php">
											<span class="title"> Gérer Docteur</span>
										</a>
									</li>
									
							</ul>










			</li>
			<li>
				<a href="#">
					<i class='bx bxs-group' ></i>
					<span class="text">Les patients</span>
				</a>



                <ul class="sub-menu">
									<li>
										<a href="ajoutPat.php">
											<span class="title"> Enregistrer Patients</span>
										</a>
									</li>
									<li>
										<a href="gererPat.php">
											<span class="title"> Gérer Patients</span>
										</a>
									</li>
								
									
							</ul>






			</li>






			<li>
				<a href="gestionRdv.php">
					<i class='bx bxs-message-dots' ></i>
					<span class="text">Les Rendez-Vous </span>
				</a>



			</li>










			<li>
				<a href="#">
					<i class='bx bxs-group' ></i>
					<span class="text">Infirmier </span>
				</a>



				<ul class="sub-menu">
									<li>
										<a href="ajoutInf.php">
											<span class="title"> Ajouter Infirmier </span>
										</a>
									</li>
									<li>
										<a href="gestinfirmier.php">
											<span class="title"> Gérer Infirmier</span>
										</a>
									</li>
								
									
							</ul>










			</li>

            <li>
				<a href="#">
					<i class='bx bxs-group' ></i>
					<span class="text">Receptionniste </span>


		

				</a>



				<ul class="sub-menu">
								
                            <li>   
							
										<a href="gestRecp.php">
											<span class="title"> Gérer Receptionniste</span>
										</a>
									</li>



									<li>
                      



					                       <a href="specialite.php">
						               <span class="title"> departements</span>
					                  </a>
                                   </li>

								
									
							</ul>



                            

       

            
            <li>
				<a href="#">
					<i class='bx bxs-group' ></i>
					<span class="text">Consultation</span>
				</a>



				<ul class="sub-menu">
								
								<li>   
								
											<a href="examen.php">
												<span class="title">Examen</span>
											</a>
										</li>
	
	
	
										<li>
						  
	
	
	
											   <a href="prescription.php">
										   <span class="title"> Prescription</span>
										  </a>
									   </li>
	
									
										
								</ul>
	











			</li>








                 
            <li>
				<a href="prestation.php">
					<i class='bx bxs-group' ></i>
					<span class="text">Prestation</span>
				</a>


			</li>



			
			<li>   
								
								<a href="paiement.php">
								<i class='bx bxs-group' ></i>
									<span class="title">Paiement</span>
								</a>
							</li>



         





		</ul>
		<ul class="side-menu">
			<li>
				<a href="#">
					<i class='bx bxs-cog' ></i>
					<span class="text">Paramètres</span>
				</a>
			</li>
			<li>
				<a href=" deconnection.php" class="logout">
					<i class='bx bxs-log-out-circle' ></i>
					<span class="text">Déconnexion</span>
				</a>
			</li>
		</ul>
	</section>
	<!-- SIDEBAR -->



	<!-- CONTENT -->
	<section id="content">
		<!-- NAVBAR -->
		<nav>
			<i class='bx bx-menu' ></i>
			<a href="#" class="nav-link">Categories 	</a>
			<form action="#">
				<div class="form-input">
					<input type="search" placeholder="Search...">
					<button type="submit" class="search-btn"><i class='bx bx-search' ></i></button>
				</div>
			</form>
			<input type="checkbox" id="switch-mode" hidden>
			<label for="switch-mode" class="switch-mode"></label>
			<a href="#" class="notification">
				<i class='bx bxs-bell' ></i>
				<span class="num">8</span>
			</a>
			<a href="#" class="profile" >
			
			
				<img src="photo.jpeg">
				<?php echo $_SESSION['nom'];?>
			</a>
		</nav>


        <body>
		<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
		<script src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
        <script src="includes/script.js"></script>
        </body>