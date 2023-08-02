<?php 

include('includes/header1.php');
$conn = mysqli_connect('localhost', 'root', '', 'gestion') or die('connection failed');

?>

















<main>
			<div class="head-title">
				<div class="left">
					<h1>Paiement</h1>
					<ul class="breadcrumb">
						<li>
							<a href="#">Paiement</a>
						</li>
						<li><i class='bx bx-chevron-right' ></i></li>
						<li>
							<a class="active" href="#">Liste Paiement</a>
						</li>
					</ul>
				</div>

     



    
     <body>

     <div class="table-data">
				<div class="order">
					<div class="head">

                    <a href="ajoutpaiement.php" class="btn3">
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
        <th>Date  </th>
        <th>Nom Patient</th>
        <th>A PAYER</th>
        <th>En Espace</th>
        <th>PAR Mobile-Money</th>
        <th>PAR CARTE</th>

        
        <th>Action</th>

    </tr>

    </thead>

    <?php 

 $bdd=mysqli_query($conn," SELECT* FROM paiementt p,ajoutpatient a, prestation t WHERE p.idPatient=a.idPatient AND  p.idPrestation=t.idPrestation ");







  while($res=mysqli_fetch_array($bdd)){



    
    ?>
    <tbody>

   
    <tr>

    <td> <?php   echo $res["idPaiement"]   ;   ?> </td>
    <td> <?php   echo $res["datePaiement"]  ;   ?> </td>
    <td> <?php   echo $res["namePatient"].' '. $res["usernamePatient"] ;   ?> </td>
    <td> <?php   echo $res["aPayer"]  ;   ?> </td>

    <td> <?php   echo $res["payerEspece"] ;   ?> </td>
    <td> <?php   echo $res["payerMobile"]  ;   ?> </td>
    <td> <?php   echo $res["payerCarte"]   ;   ?> </td>
    

   <td>

   <form action="" method="POST">
   
						 

   <input type="hidden" value=" <?php     echo $res ["idPaiement"]; ?>"  />
  
   <a href="editpaiement.php?id=<?php echo $res["idPaiement"] ?>"><i class="bx bxs-edit"></i></a>
   <a href="supprimpaiement.php?id=<?php echo $res["idPaiement"] ?>"><i class="bx bxs-trash"></i></a>


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


  </body>












</html>
