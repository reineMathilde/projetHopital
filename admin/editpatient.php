<?php 


include('includes/header1.php');
$conn = mysqli_connect('localhost', 'root', '', 'gestion') or die('connection failed');

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
							<a class="active" href="#">Modifier Patient</a>
						</li>
					</ul>
				</div>

    

     <body>

      <?php
    

    //On recupère l'id dans le lien 
    $id=$_GET['id'];
    //requete pour afficher les infos sur le patient 
    $req1=mysqli_query($conn, "SELECT * FROM ajoutpatient WHERE idPatient= $id");
    //recuperer une ligne de donnée
    $pow=mysqli_fetch_assoc($req1);
   

    //verifier si le boutton modifier a été cliqué

    if(isset($_POST['envoyer'])){


        $nameP = mysqli_real_escape_string($conn, $_POST['namePatient']);
    
       
        $usernameP = mysqli_real_escape_string($conn, $_POST['usernamePatient']);
            
           
        $ageP = mysqli_real_escape_string($conn, $_POST['agePatient']);
            $emailP = mysqli_real_escape_string($conn, $_POST['emailPatient']);
            $contactP = isset($_POST['contactPatient']) ? mysqli_real_escape_string($conn, $_POST['contactPatient']) : '';
            
           
        $sexe = mysqli_real_escape_string($conn, $_POST['sexe']);
            $typePiece = mysqli_real_escape_string($conn, $_POST['type_piece']);
            $numberPiece = mysqli_real_escape_string($conn, $_POST['number_piece']);
            
           
        $habitation = mysqli_real_escape_string($conn, $_POST['habitation']);
           $assurance = mysqli_real_escape_string($conn, $_POST['assurance']);
            $assuranceName = mysqli_real_escape_string($conn, $_POST['assurance_name']);
            $datePatient = mysqli_real_escape_string($conn, $_POST['datePatient']);
            $tauxCouverture = mysqli_real_escape_string($conn, $_POST['taux_couverture']);




            //extraire les variable envoyer par la methode post

            extract($_POST);

            //verifier si tout les champs ont été rempli

            if(isset($nameP) AND isset($usernameP) AND isset($ageP) AND isset($emailP) AND isset($contactP) AND isset($sexe) AND isset($typePiece) 
                AND isset($numberPiece) AND isset($habitation) AND isset($assurance) AND isset($assuranceName) AND isset($datePatient)
                AND isset($tauxCouverture)){

                    //requete de modification
                    $req1=mysqli_query($conn,"UPDATE ajoutpatient SET namePatient='$nameP',  usernamePatient='$usernameP', agePatient='$ageP', emailPatient='$emailP',contactPatient='$contactP',
                    sexe='$sexe' ,type_piece='$typePiece',number_piece= '$numberPiece', habitation='$habitation', assurance='$assurance', assurance_name='$assuranceName',
                    
                    datePatient='$datePatient', taux_couverture='$tauxCouverture' WHERE idPatient = '$id' ");

                    if($req1){//si la requête a été effectuée avec succès , on fait une redirection

                        echo " Les données du Patient ont été Modifié";
                    }else{

                        echo " la Modification a echoué!";
                    
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

                   <i class="bx bxs-group"></i>
                    <input type="text" placeholder="Entrez nom" name="namePatient" pattern="[^\d]+" value="<?=$pow['namePatient']  ?>" required>
                </div>



                     <div class="field">
                    <i class="bx bxs-group"></i>
                    <input type="text" placeholder="Entrez Prenom" name="usernamePatient" pattern="[^\d]+" value="<?=$pow['usernamePatient']?>"   required>
                     </div>
        </div>
       
           
        <div class="dbl-field">

            
            <div class="field">
                    <i class="bx bxs-group"></i>
                    <input type="text" placeholder="Entrez Age" name="agePatient" pattern="[0-9]+[^\d]+" value="<?=$pow['agePatient'] ?>"  required>
            </div>

            


            
            <div class="field">
                    <i class="bx bxs-envelope"></i>
                    <input type="email" placeholder="Entrez Email" name="emailPatient" value="<?=$pow['emailPatient'] ?>"  required>
            </div>

        </div>

          
        <div class="dbl-field">

            <div class="field">
                    <i class="bx bxs-phone-call"></i>
                    <input type="text" placeholder="Entrez un numero " id="contactPatient" pattern="[0-9]+" name="contactPatient" value="<?=$pow['contactPatient'] ?>" required>
             </div>

          
        

             <div class="field">
                    <input type="text" name="" placeholder="Sexe">

                
 
                 <select name="sexe" id=""  value="<?=$pow['sexe'] ?>" required> 
                  <option value="Masculin">Masculin </option>
                   <option value="Feminin">Feminin </option>
                 </select>

                 </div>

        </div>

        <div class="dbl-field">

          
                 <div class="field">
                    <input type="text" name="" placeholder="Type de Piece:">

                
 
                  
                
                 <select name="type_piece"  value="<?=$pow['type_piece'] ?>"  id="" required> 
                  <option value="CNI">CNI</option>
                   <option value ="Passeport">Passeport</option>
                 </select>

                 </div>

                 <div class="field">
                    <i class="bx bxs-phone-call"></i>
                    <input type="text" placeholder="numero de piece" id="number_piece"  value="<?=$pow['number_piece'] ?>"  pattern="[0-9]+" name="number_piece" required>
             </div>

        </div>

         
        <div class="dbl-field">

             <div class="field">
                    <i class="bx bxs-group"></i>
                    <input type="text" placeholder="Lieu habitation" name="habitation" value="<?=$pow['habitation'] ?>" pattern="[^\d]+"   required>
            </div>




            <div class="field">
                    <input type="text" name="" placeholder="Assurance:">
 
                 <select name="assurance" id=""  value="<?=$pow['assurance'] ?>"  required> 
                  <option value="Oui">oui</option>
                   <option value="non">non</option>
                 </select>

                 </div>

        </div>






        <div class="dbl-field">

            <div class="field">
                    <i class="bx bxs-group"></i>
                    <input type="text" placeholder="Nom Assurance" name="assurance_name" value="<?=$pow['assurance_name'] ?>"  pattern="[^\d]+"   required>
            </div>

         


            <div class="field">
                    <i class="bx bxs-phone-call"></i>
                    <input type="text" placeholder="taux de couverture" id="taux_couverture"  value="<?=$pow['taux_couverture'] ?>" pattern="[0-9]+" name="taux_couverture" required>
             </div>

      </div>

      <div class="dbl-field">

             <div class="field">
          
                    <input type="date" placeholder="date enregistrement:" id="datePatient" name="datePatient" value="<?=$pow['datePatient'] ?>"  required>
             </div>

        </div>


       



     


                <input type="submit" value="Modifier" name="envoyer" class="btn" />

           










        </form>
  

        </div>

        </main>



  

        





















     </body>