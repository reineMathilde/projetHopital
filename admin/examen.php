<?php 

include('includes/header1.php');
$conn = mysqli_connect('localhost', 'root', '', 'gestion') or die('connection failed');

?>

















<main>
			<div class="head-title">
				<div class="left">
					<h1>Consultation</h1>
					<ul class="breadcrumb">
						<li>
							<a href="#">Examen</a>
						</li>
						<li><i class='bx bx-chevron-right' ></i></li>
						<li>
							<a class="active" href="#">Liste</a>
						</li>
					</ul>
				</div>

    



    
     <body >

     <div class="table-data">
				<div class="order">
					<div class="head">

                    <a href="ajoutexamen.php" class="btn3">
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
        <th>poids</th>
        <th>Taille</th>
        <th>Temperature</th>
        <th>Etat Patient</th>
        <th>Type Examen</th>
        <th>Maladie</th>
        <th> Observation</th>
        <th>Nom Docteur</th>
        <th>Infirmier</th>
        <th>Date</th>
        
        <th>Action</th>

    </tr>

    </thead>

    <?php 

 $bdd=mysqli_query($conn," SELECT* FROM examen e, ajoutpatient p, ajoutdocteur d, ajoutinfirmier i WHERE e.idPatient=p.idPatient AND e.idDocteur=d.idDocteur AND e.IdInfirmier= i.idInfirmier");







  while($res=mysqli_fetch_array($bdd)){



    
    ?>
    <tbody>

   
    <tr>

    <td> <?php   echo $res["idExamen"]   ;   ?> </td>
    <td> <?php   echo $res["namePatient"].' '. $res["usernamePatient"] ;   ?> </td>
    <td> <?php   echo $res["poids"]  ;   ?> </td>
    <td> <?php   echo $res["taille"] ;   ?> </td>
    <td> <?php   echo $res["temperature"]  ;   ?> </td>
    <td> <?php   echo $res["etatPatient"]   ;   ?> </td>
    <td> <?php   echo $res["typeExamen"] ;   ?> </td>
    <td> <?php   echo $res["nomMaladie"]   ;   ?> </td>
    <td> <?php   echo $res["observation"]   ;   ?> </td>
    <td> <?php   echo $res["name"].' '. $res["username"] ;   ?> </td>
    <td> <?php   echo $res["nameI"].' '. $res["usernameI"] ;   ?> </td>
    <td> <?php   echo $res["dateExam"]  ;   ?> </td>


   <td>

   <form action="" method="POST">
   
						 

   <input type="hidden" value=" <?php     echo $res ["idExamen"]; ?>"  />
  
   <a href="editExamen.php?id=<?php echo $res["idExamen"] ?>"><i class="bx bxs-edit"></i></a>
   <a href="supprimExamen.php?id=<?php echo $res["idExamen"] ?>"><i class="bx bxs-trash"></i></a>


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
