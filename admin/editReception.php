<?php 

include('includes/header1.php');
$conn = mysqli_connect('localhost', 'root', '', 'gestion') or die('connection failed');

?>


















<main>
			<div class="head-title">
				<div class="left">
					<h1>Receptionniste</h1>
					<ul class="breadcrumb">
						<li>
							<a href="#"> Modifier Receptionniste</a>
						</li>
						<li><i class='bx bx-chevron-right' ></i></li>
						<li>
							<a class="active" href="#">Modifier Receptionniste</a>
						</li>
					</ul>
				</div>

     





     <body>
<?php

       
         //on récupère le id dans le lien
          $id = $_GET['id'];
          //requête pour afficher les infos sur le docteur 
          $req = mysqli_query($conn , "SELECT * FROM ajoutreception WHERE idreception = $id");
          $row = mysqli_fetch_assoc($req);


       //vérifier que le bouton envoyer  ajouter a bien été cliqué
       if(isset($_POST['envoyer'])){

           
$nameR = mysqli_real_escape_string($conn, $_POST['nameR']);  
$usernameR = mysqli_real_escape_string($conn, $_POST['usernameR']);
$emailR = mysqli_real_escape_string($conn, $_POST['emailR']);
$contactR= mysqli_real_escape_string($conn, $_POST['contactR']);


          
       
          
           //extraction des informations envoyé dans des variables par la methode POST
           extract($_POST);
           //verifier que tous les champs ont été remplis
           if (isset($nameR) && isset($usernameR) && isset($emailR) && isset($contactR)) {
               //requête de modification
               $req=mysqli_query($conn, "UPDATE ajoutreception SET nameR='$nameR', usernameR='$usernameR',  emailR='$emailR', contactR='$contactR' WHERE idreception= '$id'");
               
                if($req){//si la requête a été effectuée avec succès , on fait une redirection
                    $message= "Receptionniste Modifié";
                }else {//si non
                    $message = "Receptionniste non modifié";
                }

           }else {
               //si non
               $message = "Veuillez remplir tous les champs !";
           }
       }
    
    ?>






<div class="container">
        <a href="gestRecp.php" class="back_btn"><img src="">RETOUR</a>
      
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
              <input type="text" placeholder="Entrez nom" name="nameR" pattern="[^\d]+" value="<?=$row['nameR'] ?>"  required>
            </div>



       <div class="field">
         <i class="bx bxs-group"></i>
        <input type="text" placeholder="Entrez Prenom" name="usernameR" pattern="[^\d]+" value="<?=$row['usernameR'] ?>"  required>
       </div>

    </div>


    <div class="dbl-field">



   <div class="field">
        <i class="bx bxs-envelope"></i>
        <input type="email" placeholder="Entrez Email" name="emailR"  value="<?=$row['emailR'] ?>" required>
    </div>



    <div class="field">
     <i class="bx bxs-phone-call"></i>
     <input type="text" placeholder="Entrez un numero " id="contactR" pattern="[0-9]+" name="contactR" value="<?=$row['contactR'] ?>"    required>
  </div>

</div>












             

           


                



           

    

                 
                 <input type="submit" value="Modifier" name="envoyer" class="btn" />



        </form>
    </div>
</body>

</main>
</html>











                       



             




























