<?php 


include('includes/header1.php');
$conn = mysqli_connect('localhost', 'root', '', 'gestion') or die('connection failed');

?>
 

 
<main>
			<div class="head-title">
				<div class="left">
					<h1>CONSULTATION</h1>
					<ul class="breadcrumb">
						<li>
							<a href="#">Consultation</a>
						</li>
						<li><i class='bx bx-chevron-right' ></i></li>
						<li>
							<a class="active" href="#"> Modifier Examen</a>
						</li>
					</ul>
				</div>

     



     <body>

      <?php
    

    //On recupère l'id dans le lien 
    $id=$_GET['id'];
    //requete pour afficher les infos sur le patient 
    $req1=mysqli_query($conn, "SELECT * FROM examen WHERE idExamen= $id");
    //recuperer une ligne de donnée
    $pow=mysqli_fetch_assoc($req1);
   

    //verifier si le boutton modifier a été cliqué

    if(isset($_POST['envoyer'])){



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


        
        
        
          





            //extraire les variable envoyer par la methode post

            extract($_POST);

            //verifier si tout les champs ont été rempli

            if(isset($patient) AND isset($poids) AND isset($taille) AND isset($temperature) AND isset($etatPatient) AND isset($typeExamen) AND isset($nomMaladie) 
                AND isset($observation) AND isset($docteur) AND isset($infirmier) AND isset($dateExam)){ 
                    //requete de modification
     $req1=mysqli_query($conn,"UPDATE examen SET idPatient='$patient', poids='$poids', taille='$taille', temperature='$temperature', etatPatient='$etatPatient',typeExamen='$typeExamen' ,nomMaladie='$nomMaladie', observation= '$observation', idDocteur='$docteur', 
     idInfirmier='$infirmier', dateExam='$dateExam' WHERE idExamen = '$id' ");

    
                    if($req1){//si la requête a été effectuée avec succès , on fait une redirection

                        echo " Les données de la consulatation ont été Modifié";
                    }else{

                        echo " Les données de la consulatation n'ont pas été Modifié";
                    
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
              
              <input type="text" placeholder="Entrez Poids" id="poids" name="poids" value ="<?=$pow['poids'] ?>" required>
           </div>

       </div>

   
       <div class="dbl-field">
          
                <div class="field">
              
                       <input type="text" placeholder="entrez Taille" id="taille" name="taille" value= "<?=$pow['taille']?>"  required>
                 </div>


                <div class="field">
              
              <input type="number" placeholder="entrez Temperature" id="temperature" name="temperature" value="<?=$pow['temperature']?>"      required>
            </div>

        </div>
    
        <div class="dbl-field">
     

            <div class="field">
              
              <input type="text" placeholder="entrez Etat Patient" id="etatPatient" name="etatPatient"   value="<?=$pow['etatPatient']?>"  required>
            </div>
     


               <div class="field">
              
              <input type="text" placeholder="entrez type Examen" id="typeExamen" name="typeExamen" value="<?=$pow['typeExamen']?>" required>
            </div>

        </div>

        <div class="dbl-field">
    

                <div class="field">
              
                  <input type="text" placeholder="entrez nom Maladie" id="nomMaladie" name="nomMaladie"  value="<?=$pow['nomMaladie']?>" required>
               </div>

              <div class="field">
              
              <input type="text" placeholder="observation" id="observation" name="observation"  value="<?=$pow['observation']?>" required>
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
              
              <input type="date" placeholder="Date:" id="dateExam" name="dateExam"  value="<?=$pow['dateExam']?>" required>
       </div>

       </div>



       




     


                <input type="submit" value="Modifier" name="envoyer" class="btn" />

           










        </form>
  

        </div>



  

        





















     </body>

    </main>