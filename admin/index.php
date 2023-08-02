<?php

session_start();
$conn = mysqli_connect('localhost', 'root', '', 'gestion') or die('connection failed');


if(isset($_POST['envoyer'])){ // Si on clique sur le boutton , alors :
  //Nous allons verifiér les informations du formulaire
  $pseudo = mysqli_real_escape_string($conn, $_POST['pseudo']);
  $password= mysqli_real_escape_string($conn, $_POST['password']);
  if(isset($pseudo) && isset($password)) { //On verifie ici si l'utilisateur a rentré des informations
    //Nous allons mettres l'email et le mot de passe dans des variables
    
       
    
    $erreur = "" ;
     //Nous allons verifier si les informations entrée sont correctes
     //Connexion a la base de données
  
    
     //requete pour selectionner  l'utilisateur qui a pour email et mot de passe les identifiants qui ont été entrées
      $req = mysqli_query($conn , "SELECT * FROM admin WHERE pseudo = '$pseudo' AND password ='$password' ") ;
      //echo $req;
      //exit();
      $num_ligne = mysqli_num_rows($req) ;//Compter le nombre de ligne ayant rapport a la requette SQL
      if($num_ligne > 0){
        $donnee = mysqli_fetch_assoc($req);
        $_SESSION['nom']=$donnee ["pseudo"];
        // exit();

          header("Location:dashboard1.php") ;//Si le nombre de ligne est > 0 , on sera redirigé vers la page bienvenu
          // Nous allons créer une variable de type session qui vas contenir l'email de l'utilisateur
          $_SESSION['pseudo'] = $pseudo ;
      }else {//si non
          $erreur = "Nom d'utilisateur ou Mots de passe incorrectes !";
      }
  }
  else{
    echo "Veuiller remplir les champs ";
  }
}







?>
















<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Connexion</title>
    <link rel="stylesheet" href="includes/style1.css" />
  </head>
  <body>

    <main>
      <div class="box">
        <div class="inner-box">
          <div class="forms-wrap">
          <?php 
       if(isset($erreur)){// si la variable $erreur existe , on affiche le contenu ;
           echo "<p class= 'Erreur'>".$erreur."</p>"  ;
       }
       ?>
             
            <form action="" autocomplete="off" class="sign-in-form" method="post">
              <div class="logo">
                <img src="img/logo.png" alt="easyclass" />
                <h4>Hopital Générale</h4>
              </div>

              <div class="heading">
                <h2>Bienvenue !</h2>
                <h6>Espace Administrateur des Patients</h6>

                <a href="#" class="toggle"></a>
              </div>
           
          
              <div class="actual-form">
      


                <div class="input-wrap">
                  <input   type="text"   minlength="4" class="input-field" autocomplete="off" name="pseudo"    required />
                  <label>Nom d'utilisateur *</label>
                </div>

                <div class="input-wrap">
                  <input type="password" minlength="4"  class="input-field" autocomplete="off"  name="password" required />
                  <label>mot de passe *</label>
                </div>

                <input type="submit" value="Se Connecter"  name="envoyer" class="sign-btn" />

              </div>
            </form>

           
          </div>

          <div class="carousel">
            <div class="images-wrapper">
              <img src="img/inf.png" class="image img-1 show" alt="" />
          
            </div>

            <div class="text-slider">
              <div class="text-wrap">
                <div class="text-group">
                  <h2>Connectez-vous!</h2>
                  <h2>Enregistrer Les Patients!</h2>
                  <h2>Creer des Rendez-vous!</h2>
                </div>
              </div>

              <div class="bullets">
                <span class="active" data-value="1"></span>
                <span data-value="2"></span>
                <span data-value="3"></span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </main>

    <!-- Javascript file -->

    <script src="includes/app.js"></script>
  </body>
</html>
