<?php 

include('includes/header1.php');
$conn = mysqli_connect('localhost', 'root', '', 'gestion') or die('connection failed');

?>

















<main>
			<div class="head-title">
				<div class="left">
					<h1>Médecins</h1>
					<ul class="breadcrumb">
						<li>
							<a href="#">Gérer docteur</a>
						</li>
						<li><i class='bx bx-chevron-right' ></i></li>
						<li>
							<a class="active" href="#">Liste</a>
						</li>
					</ul>
				</div>





     <body> <!--style="overflow-x:scroll;"-->
  
     
     <div class="table-data">
				<div class="order">
					<div class="head">

                    <a href="ajoutDoc.php" class="btn3">
							   <i class="bx bxs-joystick-button"></i>
							   <span>Ajouter</span>
							   </a>
					</div>

 
                 <table>
                      <thead>   
                         <tr>
                            <th>Identifiant</th>
                           <th>Spécialité</th>
                          <th>Nom</th>
                          <th>Prenom</th>
                          <th>Email</th>
                              <th>Contact</th>
       
                          <th>Action</th>

                           </tr>

                      </thead>

    <?php 

    $bdd=mysqli_query($conn,"SELECT*FROM ajoutdocteur");

    $bdd=mysqli_query($conn,"SELECT * FROM ajoutdocteur t,specialite s WHERE t.idDepartement=s.idDepartement");

    while($res=mysqli_fetch_array($bdd)){



    
    ?>
    <tbody>

   
    <tr>

    <td> <?php   echo $res["idDocteur"]   ;   ?> </td>
 
    <td> <?php   echo $res["departement_name"]   ;   ?> </td>
    <td> <?php   echo $res["name"]   ;   ?> </td>
    <td> <?php   echo $res["username"]   ;   ?> </td>
    <td> <?php   echo $res["email"]   ;   ?> </td>
    <td> <?php   echo $res["contact"]   ;   ?> </td>

   <td>

   <form action="" method="POST">


   
  
            

   
						 

   <input type="hidden" value=" <?php     echo $res ["idDocteur"]; ?>"  />
   
   <a href="modifierdoc.php?id=<?php echo $res["idDocteur"] ?>"><i class="bx bxs-edit"></i></a>
   <a href="supprimDoc.php?id=<?php echo $res["idDocteur"] ?>"><i class="bx bxs-trash"></i></a>
 
   








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
  </div>
    



  <script src="app.js"></script>

  </div>


  </body>


  </main>












</html>
