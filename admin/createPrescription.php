<?php 

include('includes/header1.php');

?>


<?php 





$conn = mysqli_connect('localhost', 'root', '', 'gestion') or die('connection failed');



if (isset($_POST['envoyer'])) {
    
        $patient = mysqli_real_escape_string($conn, $_POST['patient']);
        $nature = mysqli_real_escape_string($conn, $_POST['naturePrescription']);
         $maladie = mysqli_real_escape_string($conn, $_POST['maladie']);
        $medicament = mysqli_real_escape_string($conn, $_POST['nomMedicament']);
      
      
        
        $observation= mysqli_real_escape_string($conn, $_POST['observation1']);
     

       
       
    // Insertion des données dans la table
            
            

        
    $query = "INSERT INTO prescription (idPatient,naturePrescription,idExamen,nomMedicament,observation1) VALUES ('$patient','$nature', '$maladie', '$medicament', '$observation')";
            
    // echo $query;
    // exit();     
    $result = mysqli_query($conn, $query);

    if ($result) {
            
            
            echo '<div class="success">Inscription réussie !</div>';
    } else {
                echo '<div class="error">Échec de l\'inscription. Veuillez réessayer.</div>';
    }
}


























?>

<main>
			<div class="head-title">
				<div class="left">
					<h1>Prescription</h1>
					<ul class="breadcrumb">
						<li>
							<a href="#"> Prescription</a>
						</li>
						<li><i class='bx bx-chevron-right' ></i></li>
						<li>
							<a class="active" href="#">Enregistrer Prescription</a>
						</li>
					</ul>
				</div>

     



    <body>

       <div class="container">
        
 

            <form action="" method="POST">

            <div class="dbl-field">



                  <div class="field">
                        <i class="bx bxs-graduation"></i>
                        <select name="patient" >
                            <option value=""> Selectionnez un Patient</option>
                            <?php 

                                    $bdd=mysqli_query($conn,"SELECT * FROM ajoutpatient ");

                                    while($res=mysqli_fetch_array($bdd)){

                            ?>
                            <option value="<?php   echo $res["idPatient"]   ;   ?>"> <?php   echo $res["namePatient"].' '. $res["usernamePatient"]  ;   ?></option>
                            
                            <?php } 
                            ?>
                        </select>
                        <!-- <input type="text" placeholder="Séléctionner spécialité" id="specialite" name="specialite" pattern="[^\d]+" required> -->
                  </div>
          


             
                    <div class="field">
              
                        <input type="text" placeholder="Nature Prescription" id="naturePrescription" name="naturePrescription" required>
                  </div>

             </div>
  


             <div class="dbl-field">
                    <div class="field">
                        <i class="bx bxs-graduation"></i>
                        <select name="maladie" >
                            <option value=""> Selectionnez nom Maladie</option>
                            <?php 

                                    $bdd=mysqli_query($conn,"SELECT * FROM examen ");

                                    while($res=mysqli_fetch_array($bdd)){

                            ?>
                              <option value="<?php   echo $res["idExamen"]   ;   ?>"> <?php   echo $res["nomMaladie"]   ;   ?></option>
                            
                            <?php } 
                            ?>
                        </select>
                        <!-- <input type="text" placeholder="Séléctionner spécialité" id="specialite" name="specialite" pattern="[^\d]+" required> -->
                   </div>




                 
               <div class="field">
              
                    <input type="text" placeholder="Nom Medicament" id="nomMedicament" name="nomMedicament" required>
                </div>

        </div>
        
                <div class="dbl-field">
    


                     
                <div class="field">
              
              <input type="text" placeholder="Observation" id="observation1" name="observation1" required>
             </div>

             </div>
     




                    <input type="submit" value="Enregistrer" name="envoyer" class="btn" />

               










            </form>
      

            </div>



      </body>

</main>




