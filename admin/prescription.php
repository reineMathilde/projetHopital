<?php 

include('includes/header1.php');
$conn = mysqli_connect('localhost', 'root', '', 'gestion') or die('connection failed');

?>







<main>
			<div class="head-title">
				<div class="left">
					<h1>PRESCRIPTION</h1>
					<ul class="breadcrumb">
						<li>
							<a href="#">Prescription</a>
						</li>
						<li><i class='bx bx-chevron-right' ></i></li>
						<li>
							<a class="active" href="#">Prescription</a>
						</li>
					</ul>
				</div>

     



     <body>

     <div class="table-data">
				<div class="order">
					<div class="head">

                    <a href="createPrescription.php" class="btn3">
							   <i class="bx bxs-joystick-button"></i>
							   <span>Ajouter</span>
							   </a>
					</div>


  
    
     <br>

     <table>
        <thead>
            <tr>

                <th>identifiant</th>
                <th>Nom Patient</th>
                <th> Nature Prescription</th>
                <th> Nom Maladie</th>
                <th>Nom Medicament</th>
                <th>Observation</th>
                <th>Action</th>

             </tr>


        </thead>
    <?php

    $bdd= mysqli_query($conn,"SELECT * FROM prescription p, ajoutpatient t, examen e WHERE p.idPatient=t.idPatient AND p.idExamen=e.IdExamen");

   while($res=mysqli_fetch_array($bdd)){

    ?> 
   

 


   <tbody>

   
    <tr>

    <td> <?php echo $res["idPrescription"] ;   ?>  </td>
    <td><?php  echo $res["namePatient"]. ' ' .$res["usernamePatient"]?></td>
    <td> <?php  echo $res["naturePrescription"]    ?></td>
    <td> <?php  echo $res["nomMaladie"]    ?></td>
    <td> <?php echo $res ["nomMedicament"]?></td>
    <td><?php echo $res["observation1"] ?></td>


   <td>

   <form action="" method="POST">
   
						 

   <input type="hidden" value=" <?php     echo $res ["idPrescription"]; ?>"  />
  
   <a href="editPrescription.php?id=<?php echo $res["idPrescription"] ?>"><i class="bx bxs-edit"></i></a>
   <a href="supprimPrescription.php?id=<?php echo $res["idPrescription"] ?>"><i class="bx bxs-trash"></i></a>


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










     

