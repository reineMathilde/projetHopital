<?php 

include('includes/header1.php');

?>


<?php 





$conn = mysqli_connect('localhost', 'root', '', 'gestion') or die('connection failed');



if (isset($_POST['envoyer'])) {
    
        $patient = mysqli_real_escape_string($conn, $_POST['patient']);
        $poids= mysqli_real_escape_string($conn, $_POST['poids']);
        $taille= mysqli_real_escape_string($conn, $_POST['taille']);
        $temperature= mysqli_real_escape_string($conn, $_POST['temperature']);
         $etatPatient = mysqli_real_escape_string($conn, $_POST['etatPatient']);
        $typeExamen = mysqli_real_escape_string($conn, $_POST['typeExamen']);
        $nomMaladie = mysqli_real_escape_string($conn, $_POST['nomMaladie']);
        $observation= mysqli_real_escape_string($conn, $_POST['observation']);
      
        
        $docteur= mysqli_real_escape_string($conn, $_POST['docteur']);
        $infirmier= mysqli_real_escape_string($conn, $_POST['infirmier']);
        $dateExam= mysqli_real_escape_string($conn, $_POST['dateExam']);

       
       
    // Insertion des données dans la table
            
            

        
  


$query = "INSERT INTO examen (idPatient, poids, taille, temperature, etatPatient, typeExamen, nomMaladie, observation, idDocteur, idInfirmier, dateExam)
VALUES ('$patient', '$poids', '$taille', '$temperature', '$etatPatient', '$typeExamen', '$nomMaladie', '$observation', '$docteur', '$infirmier', '$dateExam')";

            
    //echo $query;
    //exit();     
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
					<h1>Consultation</h1>
					<ul class="breadcrumb">
						<li>
							<a href="#">Consultation</a>
						</li>
						<li><i class='bx bx-chevron-right' ></i></li>
						<li>
							<a class="active" href="#">Enregistrer Examen</a>
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
              
              <input type="text" placeholder="Entrez Poids" id="poids" name="poids" required>
       </div>


       </div>


       <div class="dbl-field">
          
           <div class="field">
              
              <input type="text" placeholder="entrez Taille" id="taille" name="taille" required>
            </div>


           <div class="field">
              
              <input type="number" placeholder="entrez Temperature" id="temperature" name="temperature" required>
           </div>

       </div>

       <div class="dbl-field">

            <div class="field">
              
              <input type="text" placeholder="entrez Etat Patient" id="etatPatient" name="etatPatient" required>
          </div>
     


       <div class="field">
              
              <input type="text" placeholder="entrez type Examen" id="typeExamen" name="typeExamen" required>
       </div>

       </div>
     
       <div class="dbl-field">

             <div class="field">
              
              <input type="text" placeholder="entrez nom Maladie" id="nomMaladie" name="nomMaladie" required>
           </div>

           <div class="field">
              
              <input type="text" placeholder="observation" id="observation" name="observation" required>
           </div>

       </div>

       <div class="dbl-field">



              <div class="field">
                        <i class="bx bxs-graduation"></i>
                        <select name="docteur" >
                            <option value=""> Selectionnez un Docteur</option>
                            <?php 

                                    $bdd=mysqli_query($conn,"SELECT * FROM ajoutdocteur");

                                    while($res=mysqli_fetch_array($bdd)){

                            ?>
                            <option value="<?php   echo $res["idDocteur"]   ;   ?>"> <?php   echo $res["name"].' '. $res["username"]  ;   ?></option>
                            
                            <?php } 
                            ?>
                        </select>
                        <!-- <input type="text" placeholder="Séléctionner spécialité" id="specialite" name="specialite" pattern="[^\d]+" required> -->
             </div>
    


        

             <div class="field">
                        <i class="bx bxs-graduation"></i>
                        <select name="infirmier" >
                            <option value=""> Selectionnez un Infirmier</option>
                            <?php 

                                    $bdd=mysqli_query($conn,"SELECT * FROM ajoutinfirmier");

                                    while($res=mysqli_fetch_array($bdd)){

                            ?>
                            <option value="<?php   echo $res["idInfirmier"]   ;   ?>"> <?php   echo $res["nameI"].' '. $res["usernameI"]  ;   ?></option>
                            
                            <?php } 
                            ?>
                        </select>
                        <!-- <input type="text" placeholder="Séléctionner spécialité" id="specialite" name="specialite" pattern="[^\d]+" required> -->
             </div>


       </div>








       <div class="dbl-field">
             

             <div class="field">
              
              <input type="date" placeholder="Date:" id="dateExam" name="dateExam" required>
       </div>



       

       </div>



       
    



       
      <input type="submit" value="Enregistrer" name="envoyer" class="btn" />

               










            </form>
      

            </div>



      </body>

</main>



