<?php 

include('includes/header1.php');

?>


<?php 





$conn = mysqli_connect('localhost', 'root', '', 'gestion') or die('connection failed');



if (isset($_POST['envoyer'])) {
    
   
        $specialite = mysqli_real_escape_string($conn, $_POST['specialite']);
            $name = mysqli_real_escape_string($conn, $_POST['name']);
        $username = mysqli_real_escape_string($conn, $_POST['username']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        
        $contact = mysqli_real_escape_string($conn, $_POST['contact']);

        // Vérification des données
            
        
        $errors = array();
        if (empty($specialite)) {
            
        $errors[] = 'Veuillez saisir une spécialité.';
            }

            
}

   


    

   
if (empty($email)) {
        
       
    
} 
    
elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = 'Veuillez saisir une adresse email valide.';
}

    
    

if (empty($contact)) {
        
       
  
    } 
    
elseif (!preg_match('/^[0-9]+$/', $contact)) {
        
        

       
$errors[] = 'Veuillez saisir un numéro de contact valide.';
    }

  


        
else {
        
       
// Insertion des données dans la table
        
        

       
$query = "INSERT INTO ajoutdocteur (idDepartement, name, username, email, contact) VALUES ('$specialite', '$name', '$username', '$email', '$contact')";
        
   //echo $query;
  // exit();     
$result = mysqli_query($conn, $query);

        

       


if ($result) {
            
           
echo '<div class="success">Inscription réussie !</div>';
        } else {
            echo '<div class="error">Échec de l\'inscription. Veuillez réessayer.</div>';
        }
    }


























?>

<main>
			<div class="head-title">
				<div class="left">
					<h1>Médecins</h1>
					<ul class="breadcrumb">
						<li>
							<a href="#">Médecins</a>
						</li>
						<li><i class='bx bx-chevron-right' ></i></li>
						<li>
							<a class="active" href="#">Enregistrer Docteur</a>
						</li>
					</ul>
				</div>

     



    <body>

       <div class="container">

       <h1 class="form-title">Enregistrement</h1>
        
 

            <form action="" method="POST">



         <div class="dbl-field">

         <div class="field">
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
         
          <i class='bx bxs-graduation'></i>
        </div>



        <div class="field">
          <input type="text" placeholder="Entrez Un nom" name="name" pattern="[^\d]+" required>
          <i class='bx bxs-group'></i>
        </div>


    
        </div>

      

      <div class="dbl-field">
        <div class="field">
        <input type="text" placeholder="Entrez Prenom" name="username" pattern="[^\d]+"   required>
          <i class='bx bxs-group'></i>
        </div>


        <div class="field">
        <input type="email" placeholder="Entrez Email" name="email"   required>
          <i class='bx bxs-envelope'></i>
        </div>
      </div>


      <div class="dbl-field">
        <div class="field">
        
        <input type="text" placeholder="Entrez un numero " id="contact" pattern="[0-9]+" name="contact" required>
        <i class="bx bxs-phone-call"></i>
      </div>

    





      </div>
      <div class="button-area">
        
      <input type="submit" value="Enregistrer" name="envoyer" class="btn" />
        
      </div>



                 

               







                    </div>


            </form>

       
      

            </div>



      </body>

   </main>




