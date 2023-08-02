
<?php 

include('includes/header1.php');


$conn = mysqli_connect('localhost', 'root', '', 'gestion') or die('connection failed');



?>





<main>
			<div class="head-title">
				<div class="left">
					<h1>TAbleau de Bord</h1>
					<ul class="breadcrumb">
						<li>
							<a href="#">tableau de bord</a>
						</li>
						<li><i class='bx bx-chevron-right' ></i></li>
						<li>
							<a class="active" href="#">Admin</a>
						</li>
					</ul>
				</div>
				<a href="#" class="btn-download">
					<i class='bx bxs-cloud-download' ></i>
					<span class="text">télécharger PDF</span>
				</a>
			</div>

			<ul class="box-info">
				<li>
                    <a href="ajoutpatient.php">
						
					  
					
				
				</a>

                <i class="bx bxs-user-circle"></i>
					
					<span class="text">
						<h3>1020</h3>
						<p>  <?php $result = mysqli_query($conn,"SELECT * FROM ajoutpatient ");
$num_rows = mysqli_num_rows($result);
{
?>
Total Patients :<?php echo htmlentities($num_rows);  
} ?>		
</p>
					</span>

                    </a>
				</li>
				<li>
                    <a href=""></a>
                <i class='bx bxs-calendar-check' ></i>
						<span class="text">
						<h3>2834</h3>
						<p>Rendez-Vous</p>
					</span>
                 </a>
				</li>


				<li>
                <a href="" >
					<i class='bx bxs-dollar-circle' ></i>
					<span class="text">
						<h3>$2543</h3>
						<p>Totals des Paiements </p>
					</span>
                    </a>
				</li>

                



			</ul>


			<div class="table-data">
				<div class="order">
					<div class="head">
						<h3>Recent Orders</h3>
						<i class='bx bx-search' ></i>
						<i class='bx bx-filter' ></i>
					</div>
       
        
               <table>
						<thead>
							<tr>
								<th>User</th>
								<th>Date Order</th>
								<th>Status</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>
									<img src="img/medecin1.jpeg">
									<p>Koffi Nicaise</p>
								</td>
								<td>01-10-2021</td>
								<td><span class="status completed">Completed</span></td>
							</tr>
							<tr>
								<td>
									<img src="img/medecin2.jpeg">
									<p>Brou</p>
								</td>
								<td>01-10-2021</td>
								<td><span class="status pending">Pending</span></td>
							</tr>
							<tr>
								<td>
									<img src="img/medecin3.jpeg">
									<p>John Doe</p>
								</td>
								<td>01-10-2021</td>
								<td><span class="status process">Process</span></td>
							</tr>
							<tr>
								<td>
									<img src="img/medecin4.jpeg">
									<p>John Doe</p>
								</td>
								<td>01-10-2021</td>
								<td><span class="status pending">Pending</span></td>
							</tr>
							<tr>
								<td>
									<img src="img/medecin5.jpeg">
									<p>John Doe</p>
								</td>
								<td>01-10-2021</td>
								<td><span class="status completed">Completed</span></td>
							</tr>
						</tbody>
					</table>

					</div>
				</div>


</main>