<?php 

include('includes/header1.php');

?>


<?php 





$conn = mysqli_connect('localhost', 'root', '', 'gestion') or die('connection failed');



if (isset($_POST['envoyer'])) {
    
        $patient = mysqli_real_escape_string($conn, $_POST['patient']);
        $specialite = mysqli_real_escape_string($conn, $_POST['specialite']);
         $docteur = mysqli_real_escape_string($conn, $_POST['docteur']);
        $dateRdv = mysqli_real_escape_string($conn, $_POST['dateRdv']);
        $heureRdv = mysqli_real_escape_string($conn, $_POST['heureRdv']);
      
        
        $reception= mysqli_real_escape_string($conn, $_POST['reception']);
        $dateCreation= mysqli_real_escape_string($conn, $_POST['dateCreation']);

       
       
    // Insertion des données dans la table
            
            

        
    $query = "INSERT INTO rdv (idPatient,idDepartement,idDocteur,dateRdv,heureRdv,idReception,dateCreation) VALUES ('$patient','$specialite', '$docteur', '$dateRdv', '$heureRdv','$reception', '$dateCreation')";
            
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
					<h1>RDV</h1>
					<ul class="breadcrumb">
						<li>
							<a href="#">Creer RDV</a>
						</li>
						<li><i class='bx bx-chevron-right' ></i></li>
						<li>
							<a class="active" href="#">Enregistrer RDV</a>
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
                        <i class="bx bxs-graduation"></i>
                        <select name="specialite" >
                            <option value=""> Selectionnez une spécialité</option>
                            <?php 

                                    $bdd=mysqli_query($conn,"SELECT * FROM specialite");

                                    while($res=mysqli_fetch_array($bdd)){

                            ?>
                            <option value="<?php   echo $res["idDepartement"]   ;   ?>"> <?php   echo $res["departement_name"]   ;   ?></option>
                            
                            <?php } 
                            ?>
                        </select>
                        
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
              
                 <input type="date" placeholder="Date RDV:" id="dateRdv" name="dateRdv"   required>
           </div>
        </div>


           <div class="dbl-field">



       
             <div class="field">
              
              <input type="hour" placeholder="Heure RDV:" id="dateRdv" name="heureRdv"  required>
             </div>





       
                <div class="field">
                        <i class="bx bxs-graduation"></i>
                        <select name="reception" >
                            <option value=""> Selectionnez receptionniste</option>
                            <?php 
                                //error_reporting(0);
                                    $bdd=mysqli_query($conn,"SELECT * FROM ajoutreception ");

                                    while($res=mysqli_fetch_array($bdd)) {

                            ?>
                            <option value="<?php   echo $res['idreception'];?>"> <?php   echo $res['nameR'].' '. $res['usernameR'];?> </option>
                            
                            <?php } 
                            ?>
                        </select>
                        <!-- <input type="text" placeholder="Séléctionner spécialité" id="specialite" name="specialite" pattern="[^\d]+" required> -->
                </div>

        </div>






  
        <div class="field">
    


             
       
       <div class="field">
              
              <input type="date" placeholder="Date Création:" id="dateCreation" name="dateCreation"    required>
       </div>

       </div>










             

           


                

           
          


                


        



                    <input type="submit" value="Enregistrer" name="envoyer" class="btn" />

               










            </form>
      

            </div>



      </body>




