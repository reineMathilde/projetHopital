<?php 

include('includes/header1.php');

?>


<?php 







$conn = mysqli_connect('localhost', 'root', '', 'gestion') or die('connection failed');

if (isset($_POST['envoyer'])) {
    
   
$nameI = mysqli_real_escape_string($conn, $_POST['nameI']);
    
    

   
$usernameI = mysqli_real_escape_string($conn, $_POST['usernameI']);
    
    

   
$emailI = mysqli_real_escape_string($conn, $_POST['emailI']);
$contactI= mysqli_real_escape_string($conn, $_POST['contactI']);
   
    
   
// Vérification des données
    


    
    

   

   

        
       
// Insertion des données dans la table
        
       
$query = "INSERT INTO ajoutinfirmier (nameI, usernameI, emailI, contactI) VALUES ('$nameI', '$usernameI', '$emailI', '$contactI')";
        
        

       
$resultat = mysqli_query($conn, $query);

        

       


if ($resultat) {
            
           
echo '<div class="success">Inscription réussie !</div>';
        } 
       
else {
            
           
echo '<div class="error">Échec de l\'inscription. Veuillez réessayer.</div>';
        }
    }























?>

<main>
			<div class="head-title">
				<div class="left">
					<h1>Infirmier</h1>
					<ul class="breadcrumb">
						<li>
							<a href="#">Infirmier</a>
						</li>
						<li><i class='bx bx-chevron-right' ></i></li>
						<li>
							<a class="active" href="#">Enregistrer Infirmier</a>
						</li>
					</ul>
				</div>

     



    <body>

       <div class="container">
        
 

            <form action="" method="POST">




         

            <div class="dbl-field">

                 <div class="field">

                       <i class="bx bxs-group"></i>
                        <input type="text" placeholder="Entrez nom" name="nameI" pattern="[^\d]+" required>
                    </div>



                 <div class="field">
                        <i class="bx bxs-group"></i>
                        <input type="text" placeholder="Entrez Prenom" name="usernameI" pattern="[^\d]+"   required>
                </div>


          </div>




            <div class="dbl-field">
                
                <div class="field">
                        <i class="bx bxs-envelope"></i>
                        <input type="email" placeholder="Entrez Email" name="emailI"   required>
                </div>



                <div class="field">
                        <i class="bx bxs-phone-call"></i>
                        <input type="text" placeholder="Entrez un numero " id="contact" pattern="[0-9]+" name="contactI" required>
                 </div>
         

        </div>


                

           
          


                


        



                    <input type="submit" value="Enregistrer" name="envoyer" class="btn" />

               










            </form>
      

            </div>



      </body>


</main>




