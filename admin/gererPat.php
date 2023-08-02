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
							<a href="#">Gérer Patients</a>
						</li>
						<li><i class='bx bx-chevron-right' ></i></li>
						<li>
							<a class="active" href="#">Liste</a>
						</li>
					</ul>
				</div>

 



     <body style>

     <div class="table-data">
         <div class="order">
					<div class="head">

                    <a href="createPrestation.php" class="btn3">
							   <i class="bx bxs-joystick-button"></i>
							   <span>Ajouter Prestation</span>
							   </a>
					</div>

 

 
  <table>
    <thead>   
    <tr>
        <th>Identifiant</th>
        <th>Nom</th>
        <th>Prenom</th>
        <th>Age</th>
        <th>Email</th>
        <th>Contact</th>
        <th>Sexe</th>
        <th>Type de Pièce</th>
        <th>numero de Piece</th>
        <th>Lieu d'habitation</th>
        <th> Assurance</th>
        <th>Nom Assurance</th>
        <th>date</th>
        <th>Taux de couverture</th>
       
        <th>Action</th>

    </tr>

    </thead>

    <?php 

    $bdd=mysqli_query($conn,"SELECT*FROM ajoutpatient");

    while($res=mysqli_fetch_array($bdd)){



    
    ?>
    <tbody>

   
    <tr>

    <td> <?php   echo $res["idPatient"]   ;   ?> </td>
   
    <td> <?php   echo $res["namePatient"]   ;   ?> </td>
    <td> <?php   echo $res["usernamePatient"]   ;   ?> </td>
    <td> <?php   echo $res["agePatient"]   ;   ?> </td>
    <td> <?php   echo $res["emailPatient"]   ;   ?> </td>
    <td> <?php   echo $res["contactPatient"]   ;   ?> </td>
    <td> <?php   echo $res["sexe"]   ;   ?> </td>
    <td> <?php   echo $res["type_piece"]   ;   ?> </td>
    <td> <?php   echo $res["number_piece"]   ;   ?> </td>
    <td> <?php   echo $res["habitation"]   ;   ?> </td>
    <td> <?php   echo $res["assurance"]   ;   ?> </td>
    <td> <?php   echo $res["assurance_name"]   ;   ?> </td>
    <td> <?php   echo $res["datePatient"]   ;   ?> </td>
    <td> <?php   echo $res["taux_couverture"]   ;   ?> </td>

   <td>

   <form action="" method="POST">


   
  
            

   
						 

   <input type="hidden" value=" <?php     echo $res ["idPatient"]; ?>"  />
  
   <a href="editpatient.php?id=<?php echo $res["idPatient"] ?>"><i class="bx bxs-edit"></i></a>
   <a href="supprimpatient.php?id=<?php echo $res["idPatient"] ?>"><i class="bx bxs-trash"></i></a>









   </form>




   </td>





    </tr>

    </tbody>


    <?php 




}

?>



 <tfoot>
    <tr>
        <td colspan="15">
          
        




        </td>




    </tr>





 </tfoot>


  </table>
    



  <script src="app.js"></script>
 </div>


  </body>

  </main>












</html>
