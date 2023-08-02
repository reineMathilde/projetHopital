<?php 

include('includes/header1.php');
$conn = mysqli_connect('localhost', 'root', '', 'gestion') or die('connection failed');

?>







<main>
			<div class="head-title">
				<div class="left">
					<h1>PRESTATION</h1>
					<ul class="breadcrumb">
						<li>
							<a href="#">Prestation</a>
						</li>
						<li><i class='bx bx-chevron-right' ></i></li>
						<li>
							<a class="active" href="#">Prestation</a>
						</li>
					</ul>
				</div>

    



     <body>

     <div class="table-data">
				<div class="order">
					<div class="head">

                    <a href="createPrestation.php" class="btn3">
							   <i class="bx bxs-joystick-button"></i>
							   <span>Ajouter</span>
							   </a>
					</div>



    
     <br>

     <table>
        <thead>
            <tr>

                <th>identifiant</th>
                <th>Nature Prestation</th>
                <th> Nom Patient</th>
                <th> Taux-Couverture Assurance</th>
                <th>Cout Assuré</th>
                <th>Cout Non Assuré</th>
                <th>Total A PAYER</th>
                <th>Action</th>

             </tr>


        </thead>
    <?php

    $bdd= mysqli_query($conn,"SELECT * FROM prestation p, ajoutpatient a WHERE p.idPatient=a.idPatient ");

   while($res=mysqli_fetch_array($bdd)){

    ?> 
   

 


   <tbody>

   
    <tr>

    <td> <?php echo $res["idPrestation"] ;   ?>  </td>
    <td> <?php echo $res["naturePrestation"] ;   ?>  </td>
    <td><?php  echo $res["namePatient"]. ' ' .$res["usernamePatient"]?></td>
    <td> <?php  echo $res["taux_couverture"]    ?></td>
    <td> <?php  echo $res["coutAssure"]    ?></td>
    <td> <?php echo $res ["coutNonAssure"]?></td>
    <td> <?php echo $res ["aPayer"]?></td>



   <td>

   <form action="" method="POST">
   
						 

   <input type="hidden" value=" <?php     echo $res ["idPrestation"]; ?>"  />
  
   <a href="editPrestation.php?id=<?php echo $res["idPrestation"] ?>"><i class="bx bxs-edit"></i></a>
   <a href="supprimPrestation.php?id=<?php echo $res["idPrestation"] ?>"><i class="bx bxs-trash"></i></a>


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










     

