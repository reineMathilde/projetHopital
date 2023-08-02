<?php 

include('includes/header1.php');
$conn = mysqli_connect('localhost', 'root', '', 'gestion') or die('connection failed');

?>

















<main>
			<div class="head-title">
				<div class="left">
					<h1>Infirmier(e)</h1>
					<ul class="breadcrumb">
						<li>
							<a href="#">Infirmier(e)</a>
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

                    <a href="ajoutInf.php" class="btn3">
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

    $bdd=mysqli_query($conn,"SELECT*FROM ajoutinfirmier");

    while($res=mysqli_fetch_array($bdd)){



    
    ?>
    <tbody>

   
    <tr>

    <td> <?php   echo $res["idInfirmier"]   ;   ?> </td>
   
    <td> <?php   echo $res["nameI"]   ;   ?> </td>
    <td> <?php   echo $res["usernameI"]   ;   ?> </td>
    <td> <?php   echo $res["emailI"]   ;   ?> </td>
    <td> <?php   echo $res["contactI"]   ;   ?> </td>

   <td>

   <form action="" method="POST">


   
  
            

   
						 

   <input type="hidden" value=" <?php     echo $res ["idInfirmier"]; ?>"  />
  
   <a href="editInfirmier.php?id=<?php echo $res["idInfirmier"] ?>"><i class="bx bxs-edit"></i></a>
   <a href="supprimInfirmier.php?id=<?php echo $res["idInfirmier"] ?>"><i class="bx bxs-trash"></i></a>









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
