<?php 

include('includes/header1.php');
$conn = mysqli_connect('localhost', 'root', '', 'gestion') or die('connection failed');

?>

















<main>
			<div class="head-title">
				<div class="left">
					<h1>Receptionniste</h1>
					<ul class="breadcrumb">
						<li>
							<a href="#">Receptionniste</a>
						</li>
						<li><i class='bx bx-chevron-right' ></i></li>
						<li>
							<a class="active" href="#">Liste</a>
						</li>
					</ul>
				</div>

     

         



     <body>

     <div class="table-data">
				<div class="order">
					<div class="head">

                    <a href="ajoutReception.php" class="btn3">
							   <i class="bx bxs-joystick-button"></i>
							   <span>Ajouter</span>
							   </a>
					</div>

 

 
  <table>
    <thead>   
    <tr>
        <th>Identifiant</th>
      
        <th>Nom</th>
        <th>Prenom</th>
        <th>Email</th>
        <th>Contact</th>
       
        <th>Action</th>

    </tr>

    </thead>

    <?php 

    $bdd=mysqli_query($conn,"SELECT*FROM ajoutreception");

    while($res=mysqli_fetch_array($bdd)){



    
    ?>
    <tbody>

   
    <tr>

    <td> <?php   echo $res["idreception"]   ;   ?> </td>
   
    <td> <?php   echo $res["nameR"]   ;   ?> </td>
    <td> <?php   echo $res["usernameR"]   ;   ?> </td>
    <td> <?php   echo $res["emailR"]   ;   ?> </td>
    <td> <?php   echo $res["contactR"]   ;   ?> </td>

   <td>

   <form action="" method="POST">


   
  
            

   
						 

   <input type="hidden" value=" <?php     echo $res ["idreception"]; ?>"  />
  
   <a href="editReception.php?id=<?php echo $res["idreception"] ?>"><i class="bx bxs-edit"></i></a>
   <a href="supprimReception.php?id=<?php echo $res["idreception"] ?>"><i class="bx bxs-trash"></i></a>









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
