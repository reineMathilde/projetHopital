<?php 

include('includes/header1.php');
$conn = mysqli_connect('localhost', 'root', '', 'gestion') or die('connection failed');

?>


<main>
			<div class="head-title">
				<div class="left">
					<h1>Departements</h1>
					<ul class="breadcrumb">
						<li>
							<a href="#">Spécialité</a>
						</li>
						<li><i class='bx bx-chevron-right' ></i></li>
						<li>
							<a class="active" href="#">Modifier Département</a>
						</li>
					</ul>
				</div>

     




















     <body>
<?php

       
         //on récupère le id dans le lien
          $id = $_GET['id'];
          //requête pour afficher les infos sur le docteur 
          $req = mysqli_query($conn , "SELECT * FROM specialite WHERE idDepartement = $id");
          $row = mysqli_fetch_assoc($req);


       //vérifier que le bouton envoyer  ajouter a bien été cliqué
       if(isset($_POST['envoyer'])){
     


        
        $departement = mysqli_real_escape_string($conn, $_POST['departement_name']);

          
       
          
           //extraction des informations envoyé dans des variables par la methode POST
           extract($_POST);
           //verifier que tous les champs ont été remplis
           if (isset($departement)) {
               //requête de modification
               $req=mysqli_query($conn, "UPDATE specialite SET departement_name='$departement' WHERE idDepartement= '$id'");
               
                if($req){//si la requête a été effectuée avec succès , on fait une redirection
                    $message= "Departement Modifié";
                }else {//si non
                    $message = "Departement non modifié";
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

   
 <input type="text" placeholder="Entrez une specialité " name="departement_name" pattern="[^\d]+" value="<?=$row['departement_name'] ?>"  required>
</div>

</div>




                 
                 <input type="submit" value="Modifier" name="envoyer" class="btn" />



        </form>
    </div>
</body>

</main>
</html>






