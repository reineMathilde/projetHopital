<?php 

include('includes/header1.php');
$conn = mysqli_connect('localhost', 'root', '', 'gestion') or die('connection failed');

?>







<main>
			<div class="head-title">
				<div class="left">
					<h1>PRESTATION</h1>
					<ul class="breadcrumb">
						<li>
							<a href="#">Prestation</a>
						</li>
						<li><i class='bx bx-chevron-right' ></i></li>
						<li>
							<a class="active" href="#">Modifier Prestation</a>
						</li>
					</ul>
				</div>

     


     
     <body>
<?php

       
         //on récupère le id dans le lien
          $id = $_GET['id'];
          //requête pour afficher les infos sur le docteur 
          $req = mysqli_query($conn , "SELECT * FROM prestation WHERE idPrestation = $id");
          $row = mysqli_fetch_assoc($req);


       //vérifier que le bouton envoyer  ajouter a bien été cliqué
       if(isset($_POST['envoyer'])){

           
        $naturePrestation = mysqli_real_escape_string($conn, $_POST['naturePrestation']);
        $patient = mysqli_real_escape_string($conn, $_POST['patient']);
        $couverture = mysqli_real_escape_string($conn, $_POST['couverture']);
         $coutAssure = mysqli_real_escape_string($conn, $_POST['coutAssure']);
        $coutNonAssure = mysqli_real_escape_string($conn, $_POST['coutNonAssure']);
        $aPayer=mysqli_real_escape_string($conn, $_POST['aPayer']);


          
       
          
           //extraction des informations envoyé dans des variables par la methode POST
           extract($_POST);
           //verifier que tous les champs ont été remplis
           if (isset($naturePrestation) && isset($patient) && isset($couverture) && isset($coutAssure)  && isset($coutNonAssure)  && isset($aPayer)) {
               //requête de modification
               $req=mysqli_query($conn, "UPDATE prestation SET naturePrestation='$naturePrestation', idPatient='$patient', idPatient=' $couverture ', coutAssure='$coutAssure', coutNonAssure='$coutNonAssure' , aPayer= '$aPayer'WHERE idPrestation= '$id'");
               
                if($req){//si la requête a été effectuée avec succès , on fait une redirection
                    $message= "Prestation Modifiée";
                }else {//si non
                    $message = "Prestation non modifiée";
                }

           }else {
               //si non
               $message = "Veuillez remplir tous les champs !";
           }
       }
    
    ?>



<div class="container">
        <a href="prestation.php" class="back_btn"><img src="">Page Precedente</a>
      
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
              
                <input type="text" placeholder="Nature Prestation" id="naturePrestation" name="naturePrestation"     value="<?=$row['naturePrestation'] ?>" required>
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
                        <select name="couverture" >
                            <option value=""> Selectionnez Taux de Couverture</option>
                     


                    <?php 
                    $query2 = "SELECT * FROM ajoutpatient";
                    $bdd2 = mysqli_query($conn, $query2);

                    while ($res2 = mysqli_fetch_array($bdd2)) {
                    ?>
                    <option value="<?php echo $res2["idPatient"]; ?>"><?php echo $res2["taux_couverture"]; ?></option>
                    <?php } ?>







                        </select>
                        <!-- <input type="text" placeholder="Séléctionner spécialité" id="specialite" name="specialite" pattern="[^\d]+" required> -->
             </div>
          




               
             <div class="field">
              
              <input type="text" placeholder="Cout Assuré" id="coutAssure" name="coutAssure"     value="<?=$row['coutAssure'] ?>"  required>
             </div>
        </div>
  

          

        <div class="dbl-field">
             
             <div class="field">
              
              <input type="text" placeholder="Cout Non Assuré" id="coutNonAssure" name="coutNonAssure"     value="<?=$row['coutNonAssure'] ?>"  required>
           </div>
  

        


             
            <div class="field">
              
              <input type="text" placeholder=" A Payer " id="aPayer" name="aPayer"     value="<?=$row['aPayer'] ?>"  required>
         </div>
    </div>
  
       
    
                



           

    

                 
                 <input type="submit" value="Modifier" name="envoyer" class="btn" />
             



        </form>
    </div>
</body>
</main>
</html>











                       



             
































