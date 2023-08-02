<?php 

include('includes/header1.php');
$conn = mysqli_connect('localhost', 'root', '', 'gestion') or die('connection failed');

?>

















<main>
			<div class="head-title">
				<div class="left">
					<h1>RENDEZ-VOUS</h1>
					<ul class="breadcrumb">
						<li>
							<a href="#">Gérer RDV</a>
						</li>
						<li><i class='bx bx-chevron-right' ></i></li>
						<li>
							<a class="active" href="#">LISTE</a>
						</li>
					</ul>
				</div>

     



     <body >
     <div class="table-data">
				<div class="order">
					<div class="head">

                    <a href="createRdv.php" class="btn3">
							   <i class="bx bxs-joystick-button"></i>
							   <span>Ajouter</span>
							   </a>
					</div>
 


  
     <!-- <input type="submit" value="Ajouter" name="envoyer" class="btn2" /> -->
     <br>

 
  <table>
    <thead>   
    <tr>
        <th>Identifiant</th>
        <th>Nom Patient</th>
        <th>Departement</th>
        <th>Nom Docteur</th>
        <th>Date du RDV</th>
        <th>Heure du RDV</th>
        <th>RECEPTIONNISTE</th>
        <th>Date d APPEL</th>
       
        <th>Action</th>

    </tr>

    </thead>

    <?php 

    $bdd=mysqli_query($conn,"SELECT * FROM rdv r, ajoutpatient p, ajoutdocteur d, specialite s, ajoutreception rep WHERE r.idPatient=p.idPatient AND r.idDepartement=s.idDepartement AND r.idDocteur=d.idDocteur AND r.idReception=rep.idreception");










    while($res=mysqli_fetch_array($bdd)){



    
    ?>
    <tbody>

   
    <tr>

    <td> <?php   echo $res["idRdv"]   ;   ?> </td>
    <td> <?php   echo $res["namePatient"].' '. $res["usernamePatient"] ;   ?> </td>
    <td> <?php   echo $res["departement_name"]  ;   ?> </td>
    <td> <?php   echo $res["name"].' '. $res["username"]  ;   ?> </td>
    <td> <?php   echo $res["dateRdv"]  ;   ?> </td>
    <td> <?php   echo $res["heureRdv"]   ;   ?> </td>
    <td> <?php   echo $res["nameR"].' '. $res["usernameR"] ;   ?> </td>
    <td> <?php   echo $res["dateCreation"]   ;   ?> </td>


   <td>

   <form action="" method="POST">
   
						 

   <input type="hidden" value=" <?php     echo $res ["idRdv"]; ?>"  />
  
   <a href="editRdv.php?id=<?php echo $res["idRdv"] ?>"><i class="bx bxs-edit"></i></a>
   <a href="supprimDoc.php?id=<?php echo $res["idRdv"] ?>"><i class="bx bxs-trash"></i></a>


   </form>

   </td>

    </tr>

    </tbody>


    <?php 




}

?>



 <tfoot>
    <tr>
        <td colspan="7">
          
        




        </td>




    </tr>





 </tfoot>


  </table>
    



  <script src="app.js"></script>
  

</div>


  </body>

  </main>












</html>
