<?php 

include('includes/header1.php');
$conn = mysqli_connect('localhost', 'root', '', 'gestion') or die('connection failed');

?>

















<main>
			<div class="head-title">
				<div class="left">
					<h1>Départements</h1>
					<ul class="breadcrumb">
						<li>
							<a href="#">Départements</a>
						</li>
						<li><i class='bx bx-chevron-right' ></i></li>
						<li>
							<a class="active" href="#">Spécialité</a>
						</li>
					</ul>
				</div>

    



     <body>

     <div class="table-data">
				<div class="order">
					<div class="head">

                    <a href="ajoutspecialite.php" class="btn3">
							   <i class="bx bxs-joystick-button"></i>
							   <span>Ajouter</span>
							   </a>
					</div>


 

 
  <table>
    <thead>   
    <tr>
        <th>Identifiant</th>
        <th>Spécialité</th>
       
       
        <th>Action</th>

    </tr>

    </thead>

    <?php 

    $bdd=mysqli_query($conn,"SELECT * FROM specialite");

    while($res=mysqli_fetch_array($bdd)){



    
    ?>
    <tbody>

   
    <tr>

    <td> <?php   echo $res["idDepartement"]   ;   ?> </td>
    <td> <?php   echo $res["departement_name"]   ;   ?> </td>
    
   <td>

   <form action="" method="POST">


   
  
            

   
						 

   <input type="hidden" value=" <?php     echo $res ["idDepartement"]; ?>"  />
  
   <a href="editDepartement.php?id=<?php echo $res["idDepartement"] ?>"><i class="bx bxs-edit"></i></a>
   <a href="supprimDepartement.php?id=<?php echo $res["idDepartement"] ?>"><i class="bx bxs-trash"></i></a>









   </form>




   </td>





    </tr>

    </tbody>


    <?php 




}

?>



 <tfoot>
    <tr>
        <td colspan="3">
          
        




        </td>




    </tr>





 </tfoot>


  </table>
    



  <script src="app.js"></script>
  </div>


  </body>

  </main>












</html>
