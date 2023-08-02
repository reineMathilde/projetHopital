
<?php 


include('includes/header1.php');
$conn = mysqli_connect('localhost', 'root', '', 'gestion') or die('connection failed');

?>


<main>
			<div class="head-title">
				<div class="left">
					<h1>Médecins</h1>
					<ul class="breadcrumb">
						<li>
							<a href="#">Modifier docteur</a>
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
          $req = mysqli_query($conn , "SELECT * FROM ajoutdocteur WHERE idDocteur = $id");
          $row = mysqli_fetch_assoc($req);


       //vérifier que le bouton envoyer  ajouter a bien été cliqué
       if(isset($_POST['envoyer'])){


          
   
        $specialite = mysqli_real_escape_string($conn, $_POST['specialite']);
        $name = mysqli_real_escape_string($conn, $_POST['name']);
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    
    $contact = mysqli_real_escape_string($conn, $_POST['contact']);

          
           //extraction des informations envoyé dans des variables par la methode POST
           extract($_POST);
           //verifier que tous les champs ont été remplis
           if (isset($specialite) && isset($name) && isset($username) && isset($email) && isset($contact)) {
               //requête de modification
               $req=mysqli_query($conn, "UPDATE ajoutdocteur SET idDepartement='$specialite',  name='$name', username='$username', email='$email', contact='$contact' WHERE idDocteur = '$id'");
               
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
                        <!-- <input type="text" placeholder="Séléctionner spécialité" id="specialite" name="specialite" pattern="[^\d]+" required> -->
             </div>



     

             <div class="field">

           <i class="bx bxs-group"></i>
         <input type="text" placeholder="Entrez nom" name="name"   value="<?=$row['name']?>" pattern="[^\d]+" required>
        </div>

        </div>



        <div class="dbl-field">

           <div class="field">
                        <i class="bx bxs-group"></i>
               <input type="text" placeholder="Entrez Prenom" name="username"   value="<?=$row['username']?>"  pattern="[^\d]+"   required>
            </div>


                <div class="field">
                        <i class="bx bxs-group"></i>
               <input type="email" placeholder="Entrez votre email" name="email"   value="<?=$row['email']?>"  pattern="[^\d]+"   required>
                </div>
         </div>

   
         <div class="dbl-field">

                <div class="field">
                        <i class="bx bxs-phone-call"></i>
                        <input type="text" placeholder="Entrez un numero " id="contact"  value="<?=$row['contact']?>"  pattern="[0-9]+" name="contact" required>
                 </div>
        </div>

       

                 
                 <input type="submit" value="Modifier" name="envoyer" class="btn" />



        </form>
    </div>
</body>
</html>











                       



             




























