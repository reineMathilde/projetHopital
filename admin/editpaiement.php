<?php 

include('includes/header1.php');
$conn = mysqli_connect('localhost', 'root', '', 'gestion') or die('connection failed');

?>







<main>
			<div class="head-title">
				<div class="left">
					<h1>PAIEMENT</h1>
					<ul class="breadcrumb">
						<li>
							<a href="#">PAIEMENT</a>
						</li>
						<li><i class='bx bx-chevron-right' ></i></li>
						<li>
							<a class="active" href="#">Modifier Paiement</a>
						</li>
					</ul>
				</div>

     


     
     <body>
<?php

       
        	// On récupère l'id dans le lien
	$id = $_GET['id'];
	// Requête pour afficher les infos sur le paiement
	$req = mysqli_query($conn, "SELECT * FROM paiementt WHERE idPaiement = $id");
	$row = mysqli_fetch_assoc($req);

	// Vérifier que le bouton envoyer a bien été cliqué
	if (isset($_POST['envoyer'])) {
		
	
$datePaiement = mysqli_real_escape_string($conn, $_POST['datePaiement']);
		
		

	
$patient = mysqli_real_escape_string($conn, $_POST['patient']);
		
	
$apayer = mysqli_real_escape_string($conn, $_POST['aPayer']);
		
	
$payerEspece = mysqli_real_escape_string($conn, $_POST['payerEspece']);
		
	
$payerMobile = mysqli_real_escape_string($conn, $_POST['payerMobile']);
		
		
$payerCarte = mysqli_real_escape_string($conn, $_POST['payerCarte']);

		// Vérifier que tous les champs ont été remplis
		
	
if (!empty($datePaiement) && !empty($patient) && !empty($apayer) && !empty($payerEspece) && !empty($payerMobile) && !empty($payerCarte)) {
			
		
// Requête de modification
			
		
$req = mysqli_query($conn, "UPDATE paiementt SET datePaiement='$datePaiement', idPatient='$patient', idPrestation='$apayer', payerEspece='$payerEspece', payerMobile='$payerMobile', payerCarte='$payerCarte' WHERE idPaiement='$id'");
			if ($req) {
				
				

			
// Si la requête a été effectuée avec succès, on fait une redirection
				
			
$message = "Paiement Modifié";
			} 
		
else {
				
			
// Si non
				
			
$message = "Paiement non modifié";
			}
		} 
			}
	

			

		
else {
			
		
// Si non
			
		
$message = "Veuillez remplir tous les champs !";
		}
    ?>



<div class="container">
        <a href="paiement.php" class="back_btn"><img src="">RETOUR</a>
      
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
              
              <input type="date" placeholder="date du paiement" id="datePaiement" name="datePaiement"   value="<?=$row['datePaiement'] ?>"  required>
       </div>     
  



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

        </div>


        <div class="dbl-field">

             <div class="field">
                        <i class="bx bxs-graduation"></i>
                        <select name="aPayer" >
                            <option value=""> Selectionnez Total à Payer</option>
                     


                    <?php 
                    $query = "SELECT * FROM prestation";
                    $bdd = mysqli_query($conn, $query);

                    while ($res = mysqli_fetch_array($bdd)) {
                    ?>
                    <option value="<?php echo $res["idPrestation"]; ?>"><?php echo $res["aPayer"]; ?></option>
                    <?php } ?>







                        </select>
                        <!-- <input type="text" placeholder="Séléctionner spécialité" id="specialite" name="specialite" pattern="[^\d]+" required> -->
             </div>
          




               
             <div class="field">
              
              <input type="text" placeholder="espece" id="payerEspece" name="payerEspece"   value="<?=$row['payerEspece'] ?>">
             </div>
      
    </div>

          

        <div class="dbl-field">
             
             <div class="field">
              
              <input type="text" placeholder="paiement Mobile" id="payerMobile" name="payerMobile" value="<?=$row['payerMobile'] ?>"    >
            </div>
  


       
             
           <div class="field">
              
              <input type="text" placeholder=" paiement par carte " id="payerCarte" name="payerCarte"  value="<?=$row['payerCarte'] ?>"  >
         </div>

    </div>
  
     


            

    
       
    
                



           

    

                 
                 <input type="submit" value="Modifier" name="envoyer" class="btn" /> 
             



        </form>
    </div>
</body>

</main>
</html>











                       



             
































