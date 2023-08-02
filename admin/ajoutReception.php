<?php 

include('includes/header1.php');

?>


<?php 







$conn = mysqli_connect('localhost', 'root', '', 'gestion') or die('connection failed');

if (isset($_POST['envoyer'])) {
    
   
    $nameR = mysqli_real_escape_string($conn, $_POST['nameR']);
        
        
    
       
    $usernameR = mysqli_real_escape_string($conn, $_POST['usernameR']);
        
        
    
       
    $emailR = mysqli_real_escape_string($conn, $_POST['emailR']);
    $contactR= mysqli_real_escape_string($conn, $_POST['contactR']);
       
        
       
    // Vérification des données
        
    
    
        
        
    
       
    
       
    
            
           
    // Insertion des données dans la table
            
   
    $query1 = "INSERT INTO ajoutreception (nameR, usernameR, emailR, contactR) VALUES ('$nameR', '$usernameR', '$emailR', '$contactR')";
       echo $query1;
       exit();
    
           
    $resultat = mysqli_query($conn, $query1);
    
            
    
           
    
    
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
					<h1>Receptionniste</h1>
					<ul class="breadcrumb">
						<li>
							<a href="#">Receptionniste</a>
						</li>
						<li><i class='bx bx-chevron-right' ></i></li>
						<li>
							<a class="active" href="#">Enregistrer receptionniste</a>
						</li>
					</ul>
				</div>

     



    <body>

       <div class="container">
        
 

            <form action="" method="POST">



            <div class="dbl-field">
         

             

                 <div class="field">

                       <i class="bx bxs-group"></i>
                        <input type="text" placeholder="Entrez nom" name="nameR" pattern="[^\d]+" required>
                    </div>



                 <div class="field">
                        <i class="bx bxs-group"></i>
                        <input type="text" placeholder="Entrez Prenom" name="usernameR" pattern="[^\d]+"   required>
                </div>

          </div>



          <div class="dbl-field">

                
                <div class="field">
                        <i class="bx bxs-envelope"></i>
                        <input type="email" placeholder="Entrez Email" name="emailR"   required>
                </div>



                <div class="field">
                        <i class="bx bxs-phone-call"></i>
                        <input type="text" placeholder="Entrez un numero " id="contactR" pattern="[0-9]+" name="contactR" required>
                 </div>

          </div>



                

           
          


                


        



                    <input type="submit" value="Enregistrer" name="envoyer" class="btn" />

               










            </form>
      

            </div>



      </body>


</main>




