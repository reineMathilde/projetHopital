<?php 


include('includes/header1.php');
$conn = mysqli_connect('localhost', 'root', '', 'gestion') or die('connection failed');

?>





<main>
			<div class="head-title">
				<div class="left">
					<h1>RENDEZ-VOUS</h1>
					<ul class="breadcrumb">
						<li>
							<a href="#"> RDV</a>
						</li>
						<li><i class='bx bx-chevron-right' ></i></li>
						<li>
							<a class="active" href="#">Modifier RDV </a>
						</li>
					</ul>
				</div>

     </main>









<body>
<?php

       
         //on récupère le id dans le lien
          $id = $_GET['id'];
          //requête pour afficher les infos sur le docteur 
          $req = mysqli_query($conn , "SELECT * FROM rdv WHERE idRDV = $id");
          $row = mysqli_fetch_assoc($req);


       //vérifier que le bouton envoyer  ajouter a bien été cliqué
       if(isset($_POST['envoyer'])){


          
        $patient = mysqli_real_escape_string($conn, $_POST['patient']);
        $specialite = mysqli_real_escape_string($conn, $_POST['specialite']);
         $docteur = mysqli_real_escape_string($conn, $_POST['docteur']);
        $dateRdv = mysqli_real_escape_string($conn, $_POST['dateRdv']);
        $heureRdv = mysqli_real_escape_string($conn, $_POST['heureRdv']);
        $reception= mysqli_real_escape_string($conn, $_POST['reception']);
        $dateCreation= mysqli_real_escape_string($conn, $_POST['dateCreation']);
          
           //extraction des informations envoyé dans des variables par la methode POST
           extract($_POST);
           //verifier que tous les champs ont été remplis
           if (isset($patient) && isset($specialite) && isset($docteur) && isset($dateRdv) && isset($heureRdv)  && isset($reception)  && isset($dateCreation)) {
               //requête de modification
               $req=mysqli_query($conn, "UPDATE rdv SET idPatient='$patient',  idDepartement='$specialite',  idDocteur='$docteur', dateRdv='$dateRdv', heureRdv='$heureRdv', idReception='$reception',
               dateCreation='$dateCreation' WHERE idRdv = '$id'");
               
                if($req){//si la requête a été effectuée avec succès , on fait une redirection
                    $message= "Docteur Modifié";
                }else {//si non
                    $message = "Docteur non modifié";
                }

           }else {
               //si non
               $message = "Veuillez remplir tous les champs !";
           }
       }
    
    ?>






<div class="container">
        <a href="gestionRdv.php" class="back_btn"><img src="">Page Precedente</a>
      
        <p class="erreur_message">
           <?php 
              if(isset($message)){
                  echo $message ;
              }
           ?>
        </p>
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
              
              <input type="date" placeholder="Date RDV:" id="dateRdv" name="dateRdv"   value="<?=$row['dateRdv'] ?>" required>
       </div>
    
    </div>


    <div class="dbl-field">
       
       <div class="field">
              
              <input type="hour" placeholder="Heure RDV:" id="dateRdv" name="heureRdv"    value="<?=$row['heureRdv'] ?>"required>
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






  

    

        <div class="dbl-field">
             
       
       <div class="field">
              
              <input type="date" placeholder="Date Création:" id="dateCreation" name="dateCreation"   value="<?=$row['dateCreation'] ?>" required>
       </div>
    </div>










             

           


                



           

    

                 
                 <input type="submit" value="Modifier" name="envoyer" class="btn" />



        </form>
    </div>
</body>
</main>
</html>











                       



             




























