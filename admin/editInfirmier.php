<?php 

include('includes/header1.php');
$conn = mysqli_connect('localhost', 'root', '', 'gestion') or die('connection failed');

?>


















<main>
			<div class="head-title">
				<div class="left">
					<h1>Infirmier(e)</h1>
					<ul class="breadcrumb">
						<li>
							<a href="#"> Modifier Infirmier(e)</a>
						</li>
						<li><i class='bx bx-chevron-right' ></i></li>
						<li>
							<a class="active" href="#">Modifier</a>
						</li>
					</ul>
				</div>

     





     <body>
<?php

       
         //on récupère le id dans le lien
          $id = $_GET['id'];
          //requête pour afficher les infos sur le docteur 
          $req = mysqli_query($conn , "SELECT * FROM ajoutinfirmier WHERE idInfirmier = $id");
          $row = mysqli_fetch_assoc($req);


       //vérifier que le bouton envoyer  ajouter a bien été cliqué
       if(isset($_POST['envoyer'])){

           
$nameI = mysqli_real_escape_string($conn, $_POST['nameI']);  
$usernameI = mysqli_real_escape_string($conn, $_POST['usernameI']);
$emailI = mysqli_real_escape_string($conn, $_POST['emailI']);
$contactI= mysqli_real_escape_string($conn, $_POST['contactI']);


          
       
          
           //extraction des informations envoyé dans des variables par la methode POST
           extract($_POST);
           //verifier que tous les champs ont été remplis
           if (($nameI) && isset($usernameI) && isset($emailI) && isset($contactI)) {
               //requête de modification
               $req=mysqli_query($conn, "UPDATE ajoutinfirmier SET nameI='$nameI', usernameI='$usernameI',  emailI='$emailI', contactI='$contactI' WHERE idInfirmier = '$id'");
               
                if($req){//si la requête a été effectuée avec succès , on fait une redirection
                    $message= "Infirmier Modifié";
                }else {//si non
                    $message = "Infirmier non modifié";
                }

           }else {
               //si non
               $message = "Veuillez remplir tous les champs !";
           }
       }
    
    ?>






<div class="container">
        <a href="gestionRdv.php" class="back_btn"><img src="">RETOUR</a>
      
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

           <i class="bx bxs-group"></i>
           <input type="text" placeholder="Entrez nom" name="nameI" pattern="[^\d]+" value="<?=$row['nameI'] ?>"  required>
               </div>



           <div class="field">
                 <i class="bx bxs-group"></i>
               <input type="text" placeholder="Entrez Prenom" name="usernameI" pattern="[^\d]+" value="<?=$row['usernameI'] ?>"  required>
            </div>
       </div>




       <div class="dbl-field">

          <div class="field">
           <i class="bx bxs-envelope"></i>
            <input type="email" placeholder="Entrez Email" name="emailI"  value="<?=$row['emailI'] ?>" required>
          </div>



         <div class="field">
              <i class="bx bxs-phone-call"></i>
            <input type="text" placeholder="Entrez un numero " id="contact" pattern="[0-9]+" name="contactI" value="<?=$row['contactI'] ?>"    required>
          </div>
</div>











             

           


                



           

    

                 
                 <input type="submit" value="Modifier" name="envoyer" class="btn" />



        </form>
    </div>
</body>
</main>
</html>











                       



             




























