<!--  Ali zijn code -->


<?php 
   session_start();
   include "db_conn.php";
   if (isset($_SESSION['username']) && isset($_SESSION['id'])) {   ?>

<!DOCTYPE html>
<html>
<head>
	<title>HOME</title>
	<link rel="stylesheet" href="Logingebruikers.css">
</head>
<body>
      <div class="d-flex justify-content-center align-items-center">
      	<?php if ($_SESSION['role'] == 'admin') {?>
      	
      		<div class="card" style="width: 18rem;">
			  <img src="img/adminlogo.png" 
			       class="card-img-top" 
			       alt="Foto van de admin ">
			  <div class="card-body text-center">
			    <h5 class="card-title">
			    	<?=$_SESSION['name']?>
			    </h5>

			    <a href="logout.php" class="btn btn-dark">Logout</a>
			  </div>
			</div>
			<div class="p-3">
				<?php include 'php/members.php';
                 if (mysqli_num_rows($res) > 0) {?>
                  
				<h1 class="display-4 fs-1">Members</h1>
				<table class="table" 
				       style="width: 32rem;">
				  <thead>
				    <tr>
				      <th scope="col">#</th>
				      <th scope="col">Name</th>
				      <th scope="col">User name</th>
				      <th scope="col">Role</th>
				    </tr>
				  </thead>
				  <tbody>
				  	<?php 
				  	$i =1;
				  	while ($rows = mysqli_fetch_assoc($res)) {?>
				    <tr>
				      <th scope="row"><?=$i?></th>
				      <td><?=$rows['name']?></td>
				      <td><?=$rows['username']?></td>
				      <td><?=$rows['role']?></td>
				    </tr>
				    <?php $i++; }?>
				  </tbody>
				</table>
				<?php }?>
			</div>
      	<?php }else { ?>
      	
      		<div class="card" style="width: 18rem;">
			  <img src="img/standaardlogo.png" 
			       class="card-img-top" 
			       alt="Foto van de onder admin of lager">
			  <div class="card-body text-center">
			    <h5 class="card-title">
			    	<?=$_SESSION['name']?>
			    </h5>
			    <a href="logout.php" class="btn btn-dark">Logout</a>
			  </div>
			</div>
      	<?php } ?>
      </div>
</body>
</html>
<?php }else{
	header("Location: index.php");
} ?>

	