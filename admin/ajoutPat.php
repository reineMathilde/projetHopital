<?php include('includes/header1.php');

$conn = mysqli_connect('localhost','root','','gestion') or die('connection failed');


if (isset($_POST['envoyer'])) {
    
   
    $nameP = mysqli_real_escape_string($conn, $_POST['namePatient']);
    
       
    $usernameP = mysqli_real_escape_string($conn, $_POST['usernamePatient']);
        
       
    $ageP = mysqli_real_escape_string($conn, $_POST['agePatient']);
        $emailP = mysqli_real_escape_string($conn, $_POST['emailPatient']);
    
        $contactP = mysqli_real_escape_string($conn, $_POST['contactPatient']);
        
       
    $sexe = mysqli_real_escape_string($conn, $_POST['sexe']);
        $typePiece = mysqli_real_escape_string($conn, $_POST['type_piece']);
        $numberPiece = mysqli_real_escape_string($conn, $_POST['number_piece']);
        
       
    $habitation = mysqli_real_escape_string($conn, $_POST['habitation']);
        $assurance = mysqli_real_escape_string($conn, $_POST['assurance']);
        $assuranceName = mysqli_real_escape_string($conn, $_POST['assurance_name']);
        $datePatient = mysqli_real_escape_string($conn, $_POST['datePatient']);
        $tauxCouverture = mysqli_real_escape_string($conn, $_POST['taux_couverture']);




    
        // Vérifier si l'email existe déjà dans la table ajoutpatient
        $query = "SELECT * FROM ajoutpatient WHERE emailPatient = '$emailP'";
        $result = mysqli_query($conn, $query);
        if ($result && mysqli_num_rows($result) > 0) {
            echo "L'email existe déjà dans la base de données.";
        } 





       
    else {
            // Insérer les données dans la table ajoutpatient
            
        
    $insertQuery = "INSERT INTO ajoutpatient (namePatient, usernamePatient, agePatient, emailPatient, contactPatient, sexe, type_piece, number_piece, habitation, assurance, assurance_name, datePatient, taux_couverture) VALUES ('$nameP', '$usernameP', '$ageP', '$emailP', '$contactP', '$sexe', '$typePiece', '$numberPiece', '$habitation', '$assurance', '$assuranceName', '$datePatient', '$tauxCouverture')";
            
           
    if (mysqli_query($conn, $insertQuery)) {
                echo "patient enregistré.";
            } else {
                echo "Erreur lors de l'insertion des données : " . mysqli_error($conn);
            }
        }
    }









?>




<main>
			<div class="head-title">
				<div class="left">
					<h1>Patients</h1>
					<ul class="breadcrumb">
						<li>
							<a href="#">Patients</a>
						</li>
						<li><i class='bx bx-chevron-right' ></i></li>
						<li>
							<a class="active" href="#">Enregistrer Patient</a>
						</li>
					</ul>
				</div>

     



    <body>

       <div class="container">
        
 

            <form action="" method="POST">


               
        


            <div class="dbl-field">

                 <div class="field">

                       <i class="bx bxs-group"></i>
                        <input type="text" placeholder="Entrez nom" name="namePatient" pattern="[^\d]+" required>
                    </div>



                 <div class="field">
                        <i class="bx bxs-group"></i>
                        <input type="text" placeholder="Entrez Prenom" name="usernamePatient" pattern="[^\d]+"   required>
                </div>
           
              </div>


              <div class="dbl-field">

                
                   <div class="field">
                        <i class="bx bxs-group"></i>
                        <input type="text" placeholder="Entrez Age" name="agePatient" pattern="[0-9]+[^\d]+"   required>
                  </div>

                


                
                   <div class="field">
                        <i class="bx bxs-envelope"></i>
                        <input type="email" placeholder="Entrez Email" name="emailPatient"   required>
                   </div>

             </div>

             <div class="dbl-field">


                <div class="field">
                        <i class="bx bxs-phone-call"></i>
                        <input type="text" placeholder="Entrez un numero " id="contactPatient" pattern="[0-9]+" name="contactPatient" required>
                 </div>

              
            

                   


                 <div class="field">
                    

                    
     
                     <select name="sexe" id="" required> 
                      <option value="Masculin">Masculin </option>
			           <option value="Feminin">Feminin </option>
                     </select>

                  </div>

            </div>

                  
                 <div class="dbl-field">
              
                     <div class="field">
                        

                     <select name="type_piece" id="" required> 
                      <option value="CNI">CNI</option>
			           <option value ="Passeport">Passeport</option>
                     </select>

                     </div>

                     <div class="field">
                        <i class="bx bxs-phone-call"></i>
                        <input type="text" placeholder="numero de piece" id="number_piece" pattern="[0-9]+" name="number_piece" required>
                      </div>

                 </div>


                 <div class="dbl-field">
                    <div class="field">
                        <i class="bx bxs-group"></i>
                        <input type="text" placeholder="Lieu habitation" name="habitation" pattern="[^\d]+"   required>
                    </div>




                    <div class="field">
                        <input type="text" name="" placeholder="Assurance:">
     
                     <select name="assurance" id=""  required> 
                      <option value="Oui">oui</option>
			           <option value="non">non</option>
                     </select>

                     </div>

                </div>










                <div class="dbl-field">

                    <div class="field">
                        <i class="bx bxs-group"></i>
                        <input type="text" placeholder="Nom Assurance" name="assurance_name" pattern="[^\d]+"   required>
                    </div>

             


                    <div class="field">
                        <i class="bx bxs-phone-call"></i>
                        <input type="text" placeholder="taux de couverture" id="taux_couverture" pattern="[0-9]+" name="taux_couverture" required>
                    </div>

              </div>

              <div class="dbl-field">

                 <div class="field">
              
                        <input type="date" placeholder="date enregistrement:" id="datePatient" name="datePatient" required>
                 </div>

                 </div>


           



         


                    <input type="submit" value="Enregistrer" name="envoyer" class="btn" />

               










            </form>
      

            </div>



      </body>


    </main>




