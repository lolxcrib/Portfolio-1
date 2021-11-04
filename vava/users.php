<?php

include 'database/db.php';

include 'try.php';
$fname=$_SESSION['lastname/firstname/midname'];


$sql="SELECT * FROM `user_type`";
$run=mysqli_query($conn,$sql);


$sql="SELECT * FROM `status`";
$run_s=mysqli_query($conn,$sql);


if(isset($_POST['inset']))
{

	$name=$_POST['name'];
	$gender=$_POST['gender'];
	$address=$_POST['address'];
	$email=$_POST['email'];

	$position=$_POST['position'];
	$username=$_POST['username'];
	$password=$_POST['password'];
	$status=$_POST['stat'];

	$insert="INSERT INTO `users`(`type_id`, `lastname/firstname/midname`, `gender`, `address`, `email`, `username`, `password`, `stat_id`) VALUES ('$position','$name','$gender','$address','$email','$username','$password','$status')";

	$rs=mysqli_query($conn,$insert);

	if($rs){

		$_SESSION['insert'] = "SUCCESSFULLY INSERTED !!";
		//header('location: users.php');

		$sql="INSERT INTO `notifications`( `name`, `type`, `message`, `status`, `date`) VALUES ('$fname','adduser','$name','unread',CURRENT_TIMESTAMP)";
		$notf=mysqli_query($conn,$sql);

	}else{
		die(mysqli_error($conn));
	}
}

?>


<!DOCTYPE html>
<html>
<head>
	<title> Users</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

		<link rel="stylesheet" type="text/css" href="css/style.css">
		<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.6.1/font/bootstrap-icons.css">
  		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

  		<style type="text/css">
  			.table{

  				border: 2px black solid; box-shadow: 5px 5px 8px grey;
  			}
  			.table tr{transition: all .2s ease-in;cursor: pointer;}
  			.table tbody tr:nth-child(even){background: #EDEDED;}
			.table tbody tr:hover{background-color: #969698;transform: translate(1.02);}

  		</style>
</head>
<body>


<form action="" method="POST" class="needs-validation" novalidate>


<!-- Modal -->
<div class="modal fade" id="adduser" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add users</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">




			  <div class="mb-3">
			    <label for="exampleInputEmail1" class="form-label">Name:</label>
			    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="name" required>
			    <div id="emailHelp" class="form-text">Last Name/First Name/ Middle Name.</div>
			      <div class="invalid-feedback">
			      Please input your full name!!!
			    </div>
			  </div>

			  <div class="mb-3">
			    <label for="exampleInputPassword1" class="form-label">Gender:</label>
			    <select class="form-select" name="gender" required>
			    	<option></option>
			    	<option>Male</option>
			    	<option>Female</option>

			    </select>
			    <div class="invalid-feedback">
				     Please select a gender!!
				  </div>
			  </div>

			  <div class="mb-3">
			    <label for="exampleInputPassword1" class="form-label">Address:</label>
			<input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="address" required>
			<div id="emailHelp" class="form-text"> House/Building/Street Number, Street Name. Barangay/District Name, City/Municipality.</div>
			<div class="invalid-feedback">
		      Please input your address!!
		    </div>	
			  </div>

			   <div class="col-mb-4">
    <label for="validationCustomUsername" class="form-label">Email:</label>
    <div class="input-group has-validation">
      <span class="input-group-text" id="inputGroupPrepend">@</span>
      <input type="email" class="form-control" id="validationCustomUsername" aria-describedby="inputGroupPrepend" name="email" required>
      <div class="invalid-feedback">
        Please input your email address.
      </div>
    </div>
  </div>



			  <div class="mb-3">
			    <label for="exampleInputPassword1" class="form-label">Position:</label>
				<select class="form-select" name="position" required>
					<option></option>
				<?php
				while($rows=mysqli_fetch_array($run)){

					?>
					<option value="<?php echo$rows['id'] ?>"> <?php echo$rows['type']; ?> </option>
					<?php
				}


				?>

				</select>
				<div class="invalid-feedback">
			      Please select a position!!!
			    </div>
			  </div>
			
			<div class="mb-3">
			    <label for="exampleInputPassword1" class="form-label">Username:</label>
			<input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="username" required>	
			<div class="invalid-feedback">
		      Please input your username!!!
		    </div>
			  </div>

			  <div class="mb-3">
			    <label for="exampleInputPassword1" class="form-label">Passsword:</label>
			<input type="password" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="password" required>	
			<div class="invalid-feedback">
		      Please input your password!!
		    </div>
			  </div>

			   <div class="mb-2">
			    <label for="exampleInputPassword1" class="form-label">Status:</label>
			    <select class="form-select" name="stat">


				<?php
				while($rows=mysqli_fetch_array($run_s)){

					?>
					<option value="<?php echo$rows['id'] ?>"> <?php echo$rows['status']; ?> </option>
					<?php
				}


				?>

				</select>
				
			  </div>
			<div id="emailHelp" class="form-text">Login status.</div>
			<script>
	
				// Example starter JavaScript for disabling form submissions if there are invalid fields
			(function () {
			  'use strict'

			  // Fetch all the forms we want to apply custom Bootstrap validation styles to
			  var forms = document.querySelectorAll('.needs-validation')

			  // Loop over them and prevent submission
			  Array.prototype.slice.call(forms)
			    .forEach(function (form) {
			      form.addEventListener('submit', function (event) {
			        if (!form.checkValidity()) {
			          event.preventDefault()
			          event.stopPropagation()
			        }

			        form.classList.add('was-validated')
			      }, false)
			    })
			})()



		</script>

			
			
			  




      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-dark" name="inset">Submit</button>
      </div>
    </div>
  </div>
</div>

<!--  End Modal -->







<div class="container my-4">
 
	<h1 class="text-center" style="font-family: Bodoni MT Black; color: #0049FF;text-shadow: 10px 10px 20px black; font-size: 70px;"> Manage Access</h1>


       <?php
      if(isset($_SESSION['insert'])){
      	?>
      	<div class="alert alert-success alert-dismissible fade show" role="alert">
			  <strong>DATA !!!</strong> <?php echo $_SESSION['insert']; ?>
			  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
			</div>
      	<?php
      	
      	unset($_SESSION['insert']);
      }



      ?>


             <?php
      if(isset($_SESSION['active'])){
      	?>
      	<div class="alert alert-success alert-dismissible fade show" role="alert">
			  <strong>USER !!!</strong> <?php echo $_SESSION['active']; ?>
			  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
			</div>
      	<?php
      	
      	unset($_SESSION['active']);

      }



      ?>


             <?php
      if(isset($_SESSION['deact'])){
      	?>
      	<div class="alert alert-warning alert-dismissible fade show" role="alert">
			  <strong>USER !!!</strong> <?php echo $_SESSION['deact']; ?>
			  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
			</div>
      	<?php
      	
      	unset($_SESSION['deact']);
      }



      ?>

	<button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#adduser">
 	Add Users
	</button>

</div>

</form>








<form method="POST" action="user_update.php" class="needs-validation" novalidate>

<!-- update -->
<div class="modal fade" id="editmodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Update users</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

      	 <input type="hidden" name="update_id" id="update_id">


			  <div class="mb-3">
			    <label for="exampleInputEmail1" class="form-label">Name:</label>
			    <input type="text" class="form-control" id="name" aria-describedby="emailHelp" name="name" required> 
			    <div id="emailHelp" class="form-text">Last Name/First Name/ Middle Name.</div>
			      <div class="invalid-feedback">
			      Please input your full name!!!
			    </div>
			  </div>




			  <div class="mb-3">
			    <label for="exampleInputPassword1" class="form-label">Gender:</label>
				    <select class="form-select" id="gen" name="gender" required>
				    	<option></option>
				    	<option>Male</option>
				    	<option>Female</option>
				    </select>
			    <div class="invalid-feedback">
				     Please select a gender!!
				  </div>
			  </div>





			  <div class="mb-3">
			    <label for="exampleInputPassword1" class="form-label">Address:</label>
			<input type="text" class="form-control" id="addr" aria-describedby="emailHelp" name="address" required>
			<div id="emailHelp" class="form-text"> House/Building/Street Number, Street Name. Barangay/District Name, City/Municipality.</div>   
			<div class="invalid-feedback">
		      Please input your address!!
		    </div>	
			  </div>





			   <div class="col-mb-4">
    <label for="validationCustomUsername" class="form-label">Email:</label>
    <div class="input-group has-validation">
      <span class="input-group-text" id="inputGroupPrepend">@</span>
      <input type="email" class="form-control" id="mail" aria-describedby="inputGroupPrepend" name="email" required>  
      <div class="invalid-feedback">
        Please input your email address.
      </div>
    </div>
  </div>


<?php




$sql="SELECT * FROM `status`";
$run_s=mysqli_query($conn,$sql);


?>





		





			<div class="mb-3">
			    <label for="exampleInputPassword1" class="form-label">Username:</label>
			<input type="text" class="form-control" id="user" aria-describedby="emailHelp" name="username" required>	 
			<div class="invalid-feedback">
		      Please input your username!!!
		    </div>
			  </div>



			  <div class="mb-3">
			    <label for="exampleInputPassword1" class="form-label">Passsword:</label>
			<input type="password" class="form-control" id="pass" aria-describedby="emailHelp" name="password" required>	 
			<div class="invalid-feedback">
		      Please input your password!!
		    </div>
			  </div>




			   <div class="mb-2">
			    <label for="exampleInputPassword1" class="form-label">Status:</label>  
			    <select class="form-select" id="sts" name="stat" required>
						
										<?php
					while($rows=mysqli_fetch_array($run_s)){

						?>
						<option value="<?php echo$rows['id'] ?>"> <?php echo$rows['status']; ?> </option>
						<?php
					}


					?>
			

				</select>
				
			  </div>





			<div id="emailHelp" class="form-text">Login status.</div>






				<script>
	
				// Example starter JavaScript for disabling form submissions if there are invalid fields
			(function () {
			  'use strict'

			  // Fetch all the forms we want to apply custom Bootstrap validation styles to
			  var forms = document.querySelectorAll('.needs-validation')

			  // Loop over them and prevent submission
			  Array.prototype.slice.call(forms)
			    .forEach(function (form) {
			      form.addEventListener('submit', function (event) {
			        if (!form.checkValidity()) {
			          event.preventDefault()
			          event.stopPropagation()
			        }

			        form.classList.add('was-validated')
			      }, false)
			    })
			})()



		</script>


			
			
			  




      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-dark" name="updatedata">Submit</button>
      </div>
    </div>
  </div>
</div>

<!--  End Modal -->

</form>







<form action="" method="POST">
<!-- Modal -->
<div class="modal fade" id="deltbn" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Are you sure you want to delete?</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <input type="hidden" name="del" id="idd">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
        <button type="submit" class="btn btn-danger" name="delt">Yes</button>
      </div>
    </div>
  </div>
</div>
</form>
<?php
if(isset($_POST['delt'])){

	$del=$_POST['del'];

	$sql="DELETE FROM `users` WHERE id=$del";
	$runs=mysqli_query($conn,$sql);
	


}


?>

<div class="container">
<div class="table-responsive">
<table class="table table-bordered" id="tebol" style="">
  <thead class="table-dark">
    <tr>
    	<th>ID</th>
    	<th>Full Name</th>
    	<th>Address</th>
    	<th>Gender</th>
    	<th>Email</th>
    	
    	<th>Position</th>
    	<th style="display: none;">Username</th>
    	<th style="display: none">Password</th>
    	<th>Status</th>
    	
    	<th>Action</th>
  
    </tr>
  </thead>
  <tbody>
    <?php

	  				  $disp="SELECT
								users.id,
								users.`lastname/firstname/midname`,
								users.gender,
								users.address,
								users.email,
								users.password,
								users.username,
								user_type.type,
								status.id as stat_id,
								`status`.`status`
								FROM
								users
								INNER JOIN user_type ON users.type_id = user_type.id
								INNER JOIN `status` ON users.stat_id = `status`.id

					";

				$result=mysqli_query($conn,$disp);

				if($result->num_rows>0){
					while($row = $result-> fetch_assoc()){

						$id=$row['id'];
					
						$name=$row['lastname/firstname/midname'];
						$address=$row['address'];
						$gender=$row['gender'];
						$email=$row['email'];
						$stat_id=$row['stat_id'];
						$status=$row['status'];
						$position=$row['type'];
						$username=$row['username'];
						$password=$row['password'];
						echo '

							<tr>
								<td>'.$id.'</td>
								<td>'.$name.'</td>
								<td>'.$address.'</td>
								<td>'.$gender.'</td>
								<td>'.$email.'</td>
								<td>'.$position.'</td>
								<td style="display:none;">'.$username.'</td>
								<td style="display:none;">'.$password.'</td>
								

								<td>'.$status.'</td>
								
								
								<td>
									<button class="btn btn-dark editbtn">Update</button>
									
									 <button class="btn btn-danger deletebtn">Delete</button>
								</td>


							

							</tr>



						';



					}


				}else{

					die(mysqli_error($conn));
				}

			




			


    ?>


  </tbody>
</table>
</div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap5.min.css">
<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap5.min.js"></script>

<script>

	
	$(document).ready(function() {
    $('#tebol').DataTable({

    	 "pagingType": "full_numbers",
      "lengthMenu":[

        [10,25,50,-1],
        [10,25,50,"All"]
      ],
      responsive: true,
      language:{

        search: "_INPUT_",
        searchPlaceholder: "Search",
      }


    	
    });


    

    
} );
</script>


<script>
	$(document).ready(function(){

		$('.editbtn').on('click',function(){
			$('#editmodal').modal('show');

			$tr =$(this).closest('tr');

			var data= $tr.children("td").map(function(){

				return $(this).text();
			}).get();


			console.log(data);

			$('#update_id').val(data[0]);  
			$('#name').val(data[1]);
			$('#gen').val(data[3]);
			$('#addr').val(data[2]);
			$('#mail').val(data[4]);
			$('#pos').val(data[5]);
			$('#user').val(data[6]);
			$('#pass').val(data[7]);
			$('#sts').val(data[8]);
		



		});
	});





</script>



<script>
	$(document).ready(function(){

		$('.deletebtn').on('click',function(){
			$('#deltbn').modal('show');

			$tr =$(this).closest('tr');

			var data= $tr.children("td").map(function(){

				return $(this).text();
			}).get();


			console.log(data);

			$('#idd').val(data[0]);  
	
		



		});
	});





</script>


</body>
</html>