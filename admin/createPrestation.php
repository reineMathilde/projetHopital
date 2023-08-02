<?php 

include('includes/header1.php');

?>






<script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM=" crossorigin="anonymous"></script>

<script>





        function getCouverture(val) {
  $.ajax({
  type: "POST",
  url: "get_couverture.php",
  data:'idPatient='+val,
  success: function(data){
    $("#couverture").html(data);
  }
  });
}
   




</script>












<?php 





$conn = mysqli_connect('localhost', 'root', '', 'gestion') or die('connection failed');



if (isset($_POST['envoyer'])) {
    
        $naturePrestation = mysqli_real_escape_string($conn, $_POST['naturePrestation']);
        $patient = mysqli_real_escape_string($conn, $_POST['patient']);
        $couverture = mysqli_real_escape_string($conn, $_POST['couverture']);
         $coutAssure = mysqli_real_escape_string($conn, $_POST['coutAssure']);
        $coutNonAssure = mysqli_real_escape_string($conn, $_POST['coutNonAssure']);
        $aPayer=mysqli_real_escape_string($conn, $_POST['aPayer']);
      
      
     
     

       
       
    // Insertion des données dans la table
            
            

        
    $query = "INSERT INTO prestation (naturePrestation,idPatient,couverture,coutAssure,coutNonAssure, aPayer) VALUES ('$naturePrestation','$patient','$couverture', '$coutAssure', '$coutNonAssure' , '$aPayer')";
            
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
					<h1>Prestation</h1>
					<ul class="breadcrumb">
						<li>
							<a href="#"> Prestation</a>
						</li>
						<li><i class='bx bx-chevron-right' ></i></li>
						<li>
							<a class="active" href="#">Enregistrer Prestation</a>
						</li>
					</ul>
				</div>

     



    <body>

       <div class="container">
        
 

            <form action="" method="POST">

            <div class="dbl-field">
            
                  <div class="field">
              
                       <input type="text" placeholder="Nature Prestation" id="naturePrestation" name="naturePrestation" required>
                   </div>
  



               <div class="field">
                        <i class="bx bxs-graduation"></i>
                        <select name="patient" id="liste_patient" onChange="getCouverture(this.value);" >
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
                        <select name="couverture"  id="couverture">
                            <option value=""> Selectionnez Taux de Couverture</option>
                            <?php 

                          $bdd1=mysqli_query($conn,"SELECT * FROM ajoutpatient ");

                       while($res2=mysqli_fetch_array($bdd1)){

                       ?>
          <option value="<?php   echo $res2["taux_couverture"]   ;   ?>"> <?php   echo $res2["taux_couverture"] ;   ?></option>

             <?php } 
         ?>
                     


                  






                        </select>
                        <!-- <input type="text" placeholder="Séléctionner spécialité" id="specialite" name="specialite" pattern="[^\d]+" required> -->
             </div>
          




               
             <div class="field">
              
              <input type="text" placeholder="Cout Assuré" id="coutAssure" name="coutAssure" required>
       </div>
       </div>

       <div class="dbl-field">
  

             
             <div class="field">
              
              <input type="text" placeholder="Cout Non Assuré" id="coutNonAssure" name="coutNonAssure" required>
       </div>
  


       
             
       <div class="field">
              
              <input type="text" placeholder=" A Payer " id="aPayer" name="aPayer"   required>
       </div>
     
       </div>
     




   




                    <input type="submit" value="Enregistrer" name="envoyer" class="btn" />

               










            </form>
      

            </div>



      </body>

</main>





   