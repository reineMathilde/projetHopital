
<?php 

include('includes/header1.php');

?>


<?php 





$conn = mysqli_connect('localhost', 'root', '', 'gestion') or die('connection failed');



if (isset($_POST['envoyer'])) {
    
   
        $departement = mysqli_real_escape_string($conn, $_POST['departement_name']);



        $query = "INSERT INTO specialite (departement_name) VALUES ('$departement')";
        
   echo $query;
   exit();     
      $result = mysqli_query($conn, $query);

        

       


if ($result) {
            
           
echo '<div class="success">Département ajouté !</div>';
        } else {
            echo '<div class="error">Échec de l\'ajout du Département. Veuillez réessayer.</div>';
        }
    }





















?>








<main>
			<div class="head-title">
				<div class="left">
					<h1>Departements</h1>
					<ul class="breadcrumb">
						<li>
							<a href="#">Spécialité</a>
						</li>
						<li><i class='bx bx-chevron-right' ></i></li>
						<li>
							<a class="active" href="#">Enregistrer un Département</a>
						</li>
					</ul>
				</div>

     </main>



    <body>

       <div class="container">
        
 

            <form action="" method="POST">




               
        
                    
            <div class="dbl-field">

             

                 <div class="field">

                       <i class="bx bxs-group"></i>
                        <input type="text" placeholder="Entrez une specialité " name="departement_name" pattern="[^\d]+" required>
                    </div>

            </div >



    


                    <input type="submit" value="Enregistrer" name="envoyer" class="btn" />

               










            </form>
      

            </div>



      </body>




