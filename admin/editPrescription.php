<?php 


include('includes/header1.php');
$conn = mysqli_connect('localhost', 'root', '', 'gestion') or die('connection failed');

?>





<main>
			<div class="head-title">
				<div class="left">
					<h1>PRESCRIPTION</h1>
					<ul class="breadcrumb">
						<li>
							<a href="#">Prescription</a>
						</li>
						<li><i class='bx bx-chevron-right' ></i></li>
						<li>
							<a class="active" href="#">Modifier Prescription</a>
						</li>
					</ul>
				</div>

     

     <body>

      <?php
    

    //On recupère l'id dans le lien 
    $id=$_GET['id'];
    //requete pour afficher les infos sur le patient 
    $req1=mysqli_query($conn, "SELECT * FROM prescription WHERE idPrescription= $id");
    //recuperer une ligne de donnée
    $pow=mysqli_fetch_assoc($req1);
   

    //verifier si le boutton modifier a été cliqué

    if(isset($_POST['envoyer'])){



        $patient = mysqli_real_escape_string($conn, $_POST['patient']);
        $nature = mysqli_real_escape_string($conn, $_POST['naturePrescription']);
         $maladie = mysqli_real_escape_string($conn, $_POST['maladie']);
        $medicament = mysqli_real_escape_string($conn, $_POST['nomMedicament']);
      
      
        
        $observation= mysqli_real_escape_string($conn, $_POST['observation1']);




            //extraire les variable envoyer par la methode post

            extract($_POST);

            //verifier si tout les champs ont été rempli

            if(isset($patient) AND isset($nature) AND isset($maladie) AND isset($medicament) AND isset($observation) ){

                    //requete de modification
         $req1=mysqli_query($conn,"UPDATE prescription SET idPatient='$patient', naturePrescription='$nature',idExamen ='$maladie', nomMedicament='$medicament', observation1='$observation' WHERE idPrescription = '$id' ");


                    if($req1){//si la requête a été effectuée avec succès , on fait une redirection

                        echo " La prescription ont été Modifié";
                    }else{

                        echo " la Modification de La prescription a echoué!";
                    
                    }



                }else{
                    echo "Veuillez remplir tout les champs";
                }





    }












?>





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
              
              <input type="text" placeholder="Nature Prescription" id="naturePrescription" value="<?=$pow['naturePrescription'] ?>" name="naturePrescription" required>
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
              
              <input type="text" placeholder="Nom Medicament" id="nomMedicament" name="nomMedicament" value="<?=$pow['nomMedicament'] ?>" required>
       </div>
    </div>
    

    <div class="dbl-field">
                     
       <div class="field">
              
              <input type="text" placeholder="Observation" id="observation1" name="observation1"  value="<?=$pow['observation1'] ?>" required>
       </div>

    </div>


           
    








     


                <input type="submit" value="Modifier" name="envoyer" class="btn" />

           










        </form>
  

        </div>

</main>
