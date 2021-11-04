<?php
include 'database/db.php';


	

	if(isset($_POST['submit'])){

$name=$_POST['name'];
$midname=$_POST['midname'];
$lastname=$_POST['lastname'];
$gender=$_POST['gender'];
$address=$_POST['address'];
$supply=$_POST['supply'];
$details=$_POST['detail'];

	$sql="INSERT INTO `supplier`( `name`, `midname`, `lastname`, `supplies`, `details`, `gender`, `address`) VALUES ('$name','$midname','$lastname','$supply','$details','$gender','$address')";

	$run=mysqli_query($conn,$sql);

	if($run){

		echo "DATA INSERTED SUCCESSFULLY";
	}else{

		die(mysqli_error($conn));
	}


	}



?>

<!DOCTYPE html>
<html>
<head>
	<title>ADD SUPPLIER</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
<form action="" method="POST">
<h1 style="text-align: center;">SUPPLIER INFORMATIONS</h1>	
<label>NAME:</label><input type="text" name="name"><br><br>
<label>MIDDLE NAME:</label><input type="text" name="midname"><br><br>
<label>LAST NAME:</label><input type="text" name="lastname"><br><br>
<label>Supplies</label>
<input type="text" name="supply"><br><br>
<label>More details</label>
<textarea name="detail">
	

</textarea><br><br>
<label>GENDER:</label> <select name="gender"><option>-----</option> <option>Male</option> <option>Female</option></select><br><br>
<label>ADDRESS:</label><textarea name="address"></textarea><br><br>

<input type="submit" name="submit" value="SAVE">


</form>

<table class="content-table">
	<tr>
		
		<th>#</th>
		<th>Name</th>
		<th>Middle Name</th>
		<th>LastName</th>
		<th>Gender</th>
		<th>Adddress</th>
		<th>Action</th>

	</tr>


	<?php
	$disp="SELECT supplier.supplier_id, supplier.`name`, supplier.midname, supplier.lastname, supplier.gender, supplier.address FROM supplier";

	$result=mysqli_query($conn,$disp);

	if($result->num_rows>0){

		while($row = $result-> fetch_assoc()){

			$id=$row['supplier_id'];
			$name=$row['name'];
			$midname=$row['midname'];
			$lastname=$row['lastname'];
			$gender=$row['gender'];
			$address=$row['address'];

			echo '<tr>
			<td>'.$id.'</td>
			<td>'.$name.'</td>
			<td>'.$midname.'</td>
			<td>'.$lastname.'</td>
			<td>'.$gender.'</td>
			<td>'.$address.'</td>
	
			<td>

			<button><a href=supplier_update.php?updateid='.$id.'">Update</a></button>

			<button><a href=supplier.php?deleteid='.$id.'">Delete</a></button>

			</td>




			</tr>';





		}


	}else{


		die(mysqli_error($conn));
	}

	//delete button

	if(isset($_GET['deleteid'])){

		$id=$_GET['deleteid'];

		$sql="delete from `supplier` where supplier_id='$id'";


		$result=mysqli_query($conn,$sql);

		if($result){

			echo "DATA DELETED SUCCESSFULY!!";

			header('location: supplier.php');
		}else{

			die(mysqli_error($conn));
		}

	}



	?>

</table>
</body>
</html>