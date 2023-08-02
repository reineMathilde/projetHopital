<?php 

include('includes/header1.php');

?>


<?php 





$conn = mysqli_connect('localhost', 'root', '', 'gestion') or die('connection failed');



if (isset($_POST['envoyer'])) {
    
        $datePaiement = mysqli_real_escape_string($conn, $_POST['datePaiement']);
        $patient = mysqli_real_escape_string($conn, $_POST['patient']);
        $Apayer= mysqli_real_escape_string($conn, $_POST['aPayer']);
         $payerEspece = mysqli_real_escape_string($conn, $_POST['payerEspece']);
        $payerMobile = mysqli_real_escape_string($conn, $_POST['payerMobile']);
        $payerCarte=mysqli_real_escape_string($conn, $_POST['payerCarte']);
      
      
     
     

       
       
    // Insertion des données dans la table
            
            

        
    $query = "INSERT INTO paiementt (datePaiement,idPatient,idPrestation,payerEspece,payerMobile, payerCarte) VALUES ('$datePaiement','$patient',' $Apayer', '$payerEspece', '$payerMobile' , '$payerCarte')";
            
   // echo $query;
    //sexit();     
    $result = mysqli_query($conn, $query);

    if ($result) {
            
            
            echo '<div class="success">paiement  réussie !</div>';
    } else {
                echo '<div class="error">Échec de l\'inscription. Veuillez réessayer.</div>';
    }
}


























?>

<main>
			<div class="head-title">
				<div class="left">
					<h1>Paiement</h1>
					<ul class="breadcrumb">
						<li>
							<a href="#"> Paiement</a>
						</li>
						<li><i class='bx bx-chevron-right' ></i></li>
						<li>
							<a class="active" href="#">Enregistrer Paiement</a>
						</li>
					</ul>
				</div>

     



    <body>

       <div class="container">
        
 

            <form action="" method="POST">

     
            <div class="dbl-field">
              
                <div class="field">
              
                    <input type="date" placeholder="date du paiement" id="datePaiement" name="datePaiement" required>
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
              
              <input type="text" placeholder="espece" id="payerEspece" name="payerEspece" >
            </div>

       </div>
  

          
       <div class="dbl-field">

             
             <div class="field">
              
              <input type="text" placeholder="paiement Mobile" id="payerMobile" name="payerMobile" >
            </div>
  


       
          
            <div class="field">
              
              <input type="text" placeholder=" paiement par carte " id="payerCarte" name="payerCarte"  >
            </div>

        </div>
  
     




   




                    <input type="submit" value="Enregistrer" name="envoyer" class="btn" />

               










            </form>
      

            </div>



      </body>

</main>




